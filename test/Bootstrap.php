<?php

// set error reporting
error_reporting(E_ALL | E_STRICT);

chdir(dirname(__DIR__));

if (!file_exists('vendor/autoload.php')) {
    throw new Exception(
        'Unable to load phpunit Run `php composer.phar install`'
    );
}

// Setup autoloading
include 'vendor/autoload.php';
