<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Actions\Create;
use App\Actions\Delete;
use App\Actions\Read;
use App\Actions\Update;

$basePath = dirname(__DIR__);
$path = "$basePath/data/data.csv";


// array_shift($argv);
// $create = new Create($path, $argv);
// $create->index();

// $read = new Read($path);
// $data = $read->index();

// foreach ($data as $row) {
//     // echo var_dump($row);
//     echo var_dump(in_array('fulano', $row));
// }

// $delete = new Delete($path);
// $delete->index();

// $read = new Read($path);
// echo var_dump($read->index());

$update = new Update($path, "fulano", 'Um novo valor surgiu');
echo var_dump($update->index());