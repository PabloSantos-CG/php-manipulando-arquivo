<?php

namespace App\Actions;

use App\Utils\FileValidator;


class Delete
{

    public function __construct(
        private string $path,
        private ?string $name = null,
    ) {}

    /** @return array<int, string[]> */
    private function getDataInFile(): array
    {
        $file = \fopen($this->path, 'r');
        $data = [];

        while (($line = \fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        return $data;
    }

    public function index(): bool
    {
        $fExists = FileValidator::checkFileExists($this->path);

        if (!$fExists) return false;
        if (!$this->name) return \unlink($this->path);

        $data = $this->getDataInFile();
        $data = \array_filter($data, fn($current) => $current[0] != $this->name);

        $file = \fopen($this->path, 'w');

        \fputcsv($file, $data);
        \fclose($file);

        return true;
    }
}
