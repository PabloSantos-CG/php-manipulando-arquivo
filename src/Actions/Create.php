<?php

namespace App\Actions;

use App\Utils\FileValidator;
use ErrorException;
use SplFileObject;

class Create
{
    public function index(string $path, string $name, string $phoneNumber): void
    {
        $fExists = FileValidator::checkFileExists($path);
        $file = \fopen($path, 'a');

        if (!$fExists) {
            \fputcsv($file, ['name', 'phoneNumber']);
        }

        \fputcsv($file, [$name, $phoneNumber]);
        \fclose($file);
    }
}
