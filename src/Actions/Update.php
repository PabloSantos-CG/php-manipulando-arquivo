<?php

namespace App\Actions;

use App\Utils\FileHandler;

class Update
{
    public function __construct(
        private string $path,
        private string $target,
        private string $newValue,
    ) {}

    public function index(): bool
    {
        $fExists = FileHandler::checkFileExists($this->path);
        if (!$fExists) return false;

        $data = FileHandler::getDataInFile($this->path);

        if (!FileHandler::checkValueInList($data, $this->target)) {
            return false;
        }

        $newData = \array_map(function ($current) {
            if ($current[0] === $this->target) {
                $current[0] = $this->newValue;
            } elseif ($current[1] === $this->target) {
                $current[1] = $this->newValue;
            }

            return $current;
        }, $data);

        FileHandler::rewriteFile($this->path, $newData);

        return !empty($newData) ? true : false;
    }
}
