<?php

namespace App\Actions;

use App\Utils\FileHandler;

class Read
{
    public function __construct(
        private string $path,
    ) {}


    public function index(): ?array
    {
        $fExists = FileHandler::checkFileExists($this->path);
        if (!$fExists) return null;

        $file = \fopen($this->path, 'r');
        $data = [];

        while (($line = \fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        \fclose($file);

        return $data;
    }
}
