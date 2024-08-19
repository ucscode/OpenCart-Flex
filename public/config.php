<?php

require_once dirname(__DIR__) . '/kits/bootstrap.php';

// APPLICATION
define('APPLICATION', 'Catalog');

// HTTP
define('HTTP_SERVER', $_ENV['APP_HOST']);

// DIR
define('DIR_APPLICATION', $_ENV['DIR_CATALOG']);
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
