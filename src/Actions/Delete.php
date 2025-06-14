<?php

namespace App\Actions;

use App\Utils\FileHandler;

class Delete
{

    public function __construct(
        private string $path,
        private ?string $target = null,
    ) {}



    public function index(): bool
    {
        $fExists = FileHandler::checkFileExists($this->path);

        if (!$fExists) return false;
        if (!$this->target) return \unlink($this->path);


        $data = FileHandler::getDataInFile($this->path);

        if (!FileHandler::checkValueInList($data, $this->target)) {
            return false;
        }

        $data = \array_filter($data, fn($current) => $current[0] !== $this->target);
        $file = \fopen($this->path, 'w');

        foreach ($data as $row) {
            \fputcsv($file, $row);
        }
        \fclose($file);

        return true;
    }
}
