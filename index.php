<?php
session_start();

define('APP_MODE', 'DEBUG');
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require __DIR__ . '/vendor/autoload.php';

use App\Framework\App;
(new App())->run();

