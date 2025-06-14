<?php

namespace App\Utils;


class FileHandler
{
    public static function checkFileExists(string $path): bool
    {
        return \file_exists($path);
    }

    public static function checkIfEmpty(string $path): bool
    {
        $file = \file_get_contents($path);

        return empty($file) ? true : false;
    }

    public static function checkValueInList(array $data, string $target)
    {
        foreach ($data as $row) {
            if (\in_array($target, $row)) return true;
        }

        return false;
    }

    public static function rewriteFile(string $path, array $target)
    {
        $file = \fopen($path, 'w');

        foreach ($target as $row) {
            \fputcsv($file, $row);
        }
        \fclose($file);
    }

    /** @return array<int, string[]> */
    public static function getDataInFile(string $path): array
    {
        $file = \fopen($path, 'r');
        $data = [];

        while (($line = \fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        return $data;
    }
}
