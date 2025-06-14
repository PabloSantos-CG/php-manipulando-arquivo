<?php

namespace App\Core;

use App\Actions\Create;
use App\Actions\Read;
use App\Actions\Update;
use App\Actions\Delete;
use App\Utils\Help;
use ErrorException;
use Exception;
use ValueError;

class Core
{
    public static function run(string $path, array $args)
    {
        if (empty($args)) {
            throw new Exception('Deve informar pelo menos qual o tipo da operação e seu respectivo argumento.');
        }

        if ($args[0] === 'help') {
            Help::index();
            return;
        }

        $mode = \strtolower($args[0]);
        $data = array_slice($args, 1);

        if ($mode !== 'r' && $mode !== 'd' && count($data) % 2 !== 0) {
            throw new Exception('Quantidade de argumentos inválida!');
        }
        
        $action = match ($mode) {
            "c" => new Create($path, $data),
            "r" => new Read($path),
            "u" => new Update($path, ...$data),
            "d" => new Delete($path, ...$data),
            default => throw new ValueError("Operação inválida!")
        };

        $result = $action->index();
        if (!$result) throw new ErrorException('Algo de errado não está certo :(');
    }
}
