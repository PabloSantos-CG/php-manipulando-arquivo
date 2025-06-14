<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Core;


$basePath = dirname(__DIR__);
$path = "$basePath/data/data.csv";


try {
    array_shift($argv);
    Core::run($path, $argv);
} catch (\Throwable $error) {
    echo $error->getMessage() . PHP_EOL;
}