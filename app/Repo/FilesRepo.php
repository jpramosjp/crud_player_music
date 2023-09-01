<?php

namespace App\Repo;

use App\Models\Files;
use Exception;

class FilesRepo
{
    public static function criarOuAtualizar($params) {
        return Files::updateOrCreate([
            "codigo" => isset($params['codigo']) ? $params['codigo'] : '0',
        ],
        [
            "nome_arquivo" => $params['nome_arquivo'],
            "caminho" => $params['caminho'],
            "extensao" => $params['extensao'],
            "tamanho_arquivo" => $params['tamanho_arquivo']
        ]);
    }

    public static function pegarArquivo($codigo) {
        return Files::where('codigo', $codigo)->first();
    }
}
