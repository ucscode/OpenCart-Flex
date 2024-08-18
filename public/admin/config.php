<?php

require_once dirname(dirname(__DIR__)) . '/bootstrap.php';

// APPLICATION
define('APPLICATION', 'Admin');

// HTTP
define('HTTP_SERVER', $_ENV['APP_HOST_ADMIN']);
define('HTTP_CATALOG', $_ENV['APP_HOST']);

// DIR
define('DIR_APPLICATION', $_ENV['DIR_ADMIN']);
define('DIR_CATALOG', $_ENV['DIR_CATALOG']);
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
