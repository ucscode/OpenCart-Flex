<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Environment Variables from .env Files
|--------------------------------------------------------------------------
|
| This script sequentially loads environment variables from the .env files
| in the project directory. 
|
*/

$envFiles = ['.env', '.env.local'];

foreach ($envFiles as $envFile) {
    if (file_exists(__DIR__ . '/' . $envFile)) {
        $dotenv = Dotenv::createMutable(__DIR__, $envFile);
        $dotenv->load();
    }
}

/*
|--------------------------------------------------------------------------
| Database Connection Configuration
|--------------------------------------------------------------------------
|
| These constants define the parameters required to establish a connection
| to your database. Ensure that these environment variables are correctly
| set in your .env file (or .env.local for local overrides) to match your
| database credentials and settings.
|
*/

define('DB_DRIVER', $_ENV['DB_DRIVER']);
define('DB_HOSTNAME', $_ENV['DB_HOSTNAME']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_DATABASE', $_ENV['DB_DATABASE']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_PREFIX', $_ENV['DB_PREFIX']);

/*
|--------------------------------------------------------------------------
| Shared Directory Paths
|--------------------------------------------------------------------------
|
| These constants define the directory paths used across the application
| in both `config.php` and `admin/config.php`. Setting these paths through
| environment variables ensures consistency and allows for flexible configuration
| depending on the environment (development, staging, production).
|
| - DIR_OPENCART: Base path to the OpenCart installation.
| - DIR_EXTENSION: Path to the extensions directory.
| - DIR_IMAGE: Path to the image storage directory.
| - DIR_SYSTEM: Path to the system files directory.
| - DIR_CONFIG: Path to the configuration files directory.
| - DIR_STORAGE: Path to the storage directory for files and cache.
| - DIR_CACHE: Path to the cache directory.
| - DIR_DOWNLOAD: Path to the directory for downloadable files.
| - DIR_LOGS: Path to the logs directory.
| - DIR_SESSION: Path to the session files directory.
| - DIR_UPLOAD: Path to the directory for uploaded files.
|
*/

define('DIR_OPENCART', $_ENV['DIR_OPENCART']);
define('DIR_EXTENSION', $_ENV['DIR_EXTENSION']);
define('DIR_IMAGE', $_ENV['DIR_IMAGE']);
define('DIR_SYSTEM', $_ENV['DIR_SYSTEM']);
define('DIR_CONFIG', $_ENV['DIR_CONFIG']);
define('DIR_STORAGE', $_ENV['DIR_STORAGE']);
define('DIR_CACHE', $_ENV['DIR_CACHE']);
define('DIR_DOWNLOAD', $_ENV['DIR_DOWNLOAD']);
define('DIR_LOGS', $_ENV['DIR_LOGS']);
define('DIR_SESSION', $_ENV['DIR_SESSION']);
define('DIR_UPLOAD', $_ENV['DIR_UPLOAD']);
