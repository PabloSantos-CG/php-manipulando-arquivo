<?php

namespace App\Utils;

class Help
{
    public static function index()
    {
        $message = (
            \PHP_EOL .
            "Entenda os argumentos necessários para o uso:" . \PHP_EOL .
            "\tC -> Recebe os argumentos: nome_do_contato e número_do_telefone;" . PHP_EOL .
            "\tR -> Não recebe argumentos, apenas executa o arquivo;" . PHP_EOL .
            "\tU -> Recebe os argumentos: valor_antigo e novo_valor;" . PHP_EOL .
            "\tD -> Recebe os argumentos: alvo, representa o nome ou número_do_telefone (se omitido, irá apagar o arquivo por completo)." .
            \PHP_EOL . \PHP_EOL
        );

        echo $message;
    }
}
