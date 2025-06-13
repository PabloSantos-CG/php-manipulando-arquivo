<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Actions\Create;

$create = new Create();
$basePath = dirname(__DIR__);
$path = "$basePath/data/data.csv";

$create->index($path, 'Fulano', '(77) 9 0000-0000');
