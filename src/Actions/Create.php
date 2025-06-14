<?php

namespace App\Actions;

use App\Utils\FileHandler;


class Create
{
    /**
     * @param string[] $data
     */
    public function __construct(
        private string $path,
        private array $data,
    ) {}


    public function index(): bool
    {
        $fileExists = FileHandler::checkFileExists($this->path);
        $file = \fopen($this->path, 'a');

        $fileIsEmpty = FileHandler::checkIfEmpty($this->path);
        if (!$fileExists || $fileIsEmpty) {
            \fputcsv($file, ['name', 'phoneNumber']);
        }

        \fputcsv($file, $this->data);
        \fclose($file);

        return true;
    }
}
