<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Actions\Create;
use App\Actions\Read;

$basePath = dirname(__DIR__);
$path = "$basePath/data/data.csv";

// $create = new Create($path, $argv);
// $create->index();

$read = new Read($path);
echo var_dump($read->index());