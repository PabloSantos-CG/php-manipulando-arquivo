<?php

namespace App\Core;

use App\Actions\Create;
use App\Actions\Read;
use App\Actions\Update;
use App\Actions\Delete;

use Exception;
use ValueError;

class Core
{
    public static function run(...$args)
    {
        if (!$args) {
            throw new Exception('Deve informar pelo menos qual o tipo da operação.');
        }

        $mode = $args[0];
        $data = array_slice($args, 1);

        if (count($data) % 2 !== 0) {
            throw new Exception('Quantidade de argumentos inválida!');
        }

        $action = match ($mode) {
            "C", "c" => new Create(),
            "R", "r" => new Read(),
            "U", "u" => new Update(),
            "D", "d" => new Delete(),
            default => throw new ValueError("Operação inválida!")
        };
    }
}
