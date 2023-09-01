<?php
namespace App\Services\Music;
use App\Repo\MusicRepo;

use Exception;

class MusicService
{

    public static function pegarMusicas() 
    {
        return MusicRepo::pegarMusicas();
    }

    public static function pegarMusica($codigo) 
    {
        return MusicRepo::pegarMusica($codigo);
    }

    public static function deletar($codigo) 
    {
        return MusicRepo::deletar($codigo);
    }
    public static function salvarMusica($parametros) 
    {
        if(!MusicRepo::criarOuAtualizar($parametros)) {
            throw new Exception("erro ao inserir musica");
        }
    }
}