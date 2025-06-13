<?php

namespace App\Actions;

use App\Utils\FileValidator;


class Delete
{

    public function __construct(
        private string $path,
        private ?string $name = null,
    ) {}

    private function getDataInFile()
    {
        $file = \fopen($this->path, 'r');
        $data = [];

        while (($line = \fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        return $data;
    }

    public function index()
    {
        $fExists = FileValidator::checkFileExists($this->path);

        if (!$fExists) return false;
        if (!$this->name) return \unlink($this->path);

        $data = $this->getDataInFile();

        
        
    }
}
/*
retorno é uma lista de linhas
entao devo percorrer cada linha e ver se o nome da match
se der:
    linha a ser apagada
se não:
    retorna false
*/