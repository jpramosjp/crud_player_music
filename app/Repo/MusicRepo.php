<?php

namespace App\Repo;

use App\Models\Music;
use Exception;
use Illuminate\Support\Facades\DB;

class MusicRepo
{
    public static function pegarMusicas()
    {
        return Music::with('arquivoImagem')
        ->select('musica.codigo', 'musica.nome_musica', 'musica.autor', 'arquivos.caminho as imagem_caminho', 'musica.arquivo_audio')
        ->join('arquivos', 'musica.arquivo_imagem', '=', 'arquivos.codigo')
        ->get();
    }
    public static function pegarMusica($codigo)
    {
        return Music::where('codigo', $codigo)->first();
    }

    public static function deletar($codigo)
    {
        return Music::destroy($codigo);
    }
    public static function criarOuAtualizar($params) 
    {
        return Music::updateOrCreate([
            "codigo" => isset($params['codigo']) ? $params['codigo'] : '0',
        ],
        [
            "nome_musica" => $params['nome_musica'],
            "autor" => $params['autor'],
            "arquivo_audio" => $params['audio'],
            "arquivo_imagem" => $params['perfil']
        ]);
    }
}
