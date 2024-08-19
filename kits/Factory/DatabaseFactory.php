<?php

namespace Opencart\Kits\Factory;

use ErrorException;
use PDO;

class DatabaseFactory
{
    public static function createConnection(): PDO
    {
        switch (strtolower(DB_DRIVER)) {
            case 'pdo':
            case 'mysqli':
                $dsn = "mysql:host=%s;port=%d;dbname=%s;charset=utf8";
                break;

            case 'pgsql':
                $dsn = "pgsql:host=%s;port=%d;dbname=%s";
                break;

            default:
                throw new ErrorException(sprintf("Unsupported database driver: %s", DB_DRIVER));
        }
        
        $dsn = sprintf($dsn, DB_HOSTNAME, DB_PORT, DB_DATABASE);

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        return new \PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    }
}