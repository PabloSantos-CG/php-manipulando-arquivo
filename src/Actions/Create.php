<?php

namespace App\Actions;

use App\Utils\FileValidator;


class Create
{
    /**
     * @param string[] $data
     */
    public function __construct(
        private string $path,
        private array $data,
    ) {}


    public function index(): void
    {
        $fExists = FileValidator::checkFileExists($this->path);
        $file = \fopen($this->path, 'a');

        if (!$fExists) {
            \fputcsv($file, ['name', 'phoneNumber']);
        }

        \fputcsv($file, $this->data);
        \fclose($file);
    }
}
