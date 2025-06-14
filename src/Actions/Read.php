<?php

namespace App\Actions;

use App\Utils\FileHandler;

class Read
{
    public function __construct(
        private string $path,
    ) {}


    public function index(): bool
    {
        $fExists = FileHandler::checkFileExists($this->path);
        if (!$fExists) return false;

        $file = \fopen($this->path, 'r');
        $data = [];

        while (($line = \fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        \fclose($file);

        echo \var_dump($data) . \PHP_EOL;
        return true;
    }
}
