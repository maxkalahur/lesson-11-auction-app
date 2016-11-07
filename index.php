<?php
session_start();

define('APP_MODE', 'DEBUG');

require __DIR__ . '/vendor/autoload.php';

use App\Framework\App;

(new App())->run();

