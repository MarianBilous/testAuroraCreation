<?php

declare(strict_types=1);

ini_set('display_errors', '1');

define('ROOT', dirname(__FILE__));

require_once 'app/autoload.php';
require_once 'config/database.php';
require_once 'classes/helpers.php';

try {
    System\Router::run();
} catch (ErrorException $exception) {
    echo $exception->getMessage();
}
