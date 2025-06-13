<?php

namespace App\Utils;

class FileValidator {
    public static function checkFileExists(string $path) {
        return \file_exists($path);
    }
}