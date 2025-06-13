<?php

namespace App\Actions;

use App\Interfaces\ActionInterface;
use App\Utils\FileValidator;
use ErrorException;
use SplFileObject;

class Create implements ActionInterface
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
