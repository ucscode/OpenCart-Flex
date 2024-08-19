<?php

namespace Opencart\Kits\Command;

use Exception;
use Opencart\Kits\Exception\FileAccessException;
use Opencart\Kits\Factory\DatabaseFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class InstallCommand
{
    protected SymfonyStyle $inputOutput;
    private \PDO $pdo;

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->inputOutput = new SymfonyStyle($input, $output);

        try {
            $this->inputOutput->title('Installing Opencart Flex');
            
            $this->inputOutput->title('Initializing database connection!');
            $this->pdo = DatabaseFactory::createConnection();

            $this->inputOutput->title('Creating database schema');
            $this->createDatabaseSchema();

            $this->inputOutput->title('Processing table data');
            $this->loadDatabaseData();

            $this->inputOutput->success('Installation Successful!');
            return Command::SUCCESS;
        } catch(\Exception $e) {
            $this->inputOutput->error($e->getMessage());
            return Command::FAILURE;
        }
    }
    
    protected function createDatabaseSchema(): void
    {
        $sql = sprintf("SELECT COUNT(*) as total FROM information_schema.tables WHERE table_schema = '%s'", DB_DATABASE);
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetch();

        // Create table structure if not present
        if (empty($result['total'])) {
            if (false !== $this->pdo->exec($this->getSQLStatement('schema'))) {
                $this->inputOutput->success('Database schema created successfully.');
                return;
            }
            
            throw new Exception('Failed to create database schema');
        }

        $this->inputOutput->warning("Database schema is already created");
    }

    protected function loadDatabaseData(): void
    {
        $sql = sprintf("SELECT COUNT(*) FROM %s%s", DB_PREFIX, 'user');
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetchColumn();
        
        if (!$result) {
            $this->inputOutput->writeln('Creating temporary table data');

            if (false !== $this->pdo->exec($this->getSQLStatement('data'))) {
                $this->inputOutput->success('Table data loaded successfully.');
                return;
            }
                
            throw new Exception('Failed to load table data');
        }

        $this->inputOutput->warning("Table data is already loaded.");
    }

    private function getSQLStatement(string $filename): string
    {
        $filepath = __DIR__ . sprintf('/sql/%s', $filename);
        $sqlFilepath = $filepath . '.sql';
        
        if (!file_exists($filepath)) {
            throw new FileAccessException(sprintf('File not found: "%s"', $filepath));
        }

        $syntax = str_replace('{{ DB_PREFIX }}', DB_PREFIX, file_get_contents($filepath));

        file_put_contents($sqlFilepath, $syntax);

        return $syntax;
    }
}