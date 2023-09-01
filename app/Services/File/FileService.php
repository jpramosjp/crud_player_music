<?php
namespace App\Services\File;
use Illuminate\Support\Facades\Storage;
use App\Repo\FilesRepo;

use Exception;

class FileService
{

    public static function salvarArquivo($arquivos) 
    {
        foreach($arquivos as $tipo => $arquivo) {
            if(empty($arquivo)) {
                throw new Exception("Não foi possível ler o arquivo");
            }

            $caminho = $tipo == 'perfil' ? 'img' : 'sounds';

            $path = $arquivo->storeAs('public/' . $caminho, $arquivo->getClientOriginalName());
            $metodo = storage_path('app/' . $path);
            if($tipo == 'perfil') {
                $arquivo->move(public_path($caminho), $arquivo->getClientOriginalName());
                unlink(storage_path('app/' . $path));
                $metodo = "img/" .  $arquivo->getClientOriginalName();
            }
            $dados = [
            "nome_arquivo" => $arquivo->getClientOriginalName(),
            "extensao" => $arquivo->getClientOriginalExtension(),
            "tamanho_arquivo" => 1,
            "caminho" => $metodo
            ];

            $codigos[$tipo] = FilesRepo::criarOuAtualizar($dados);
            if($codigos[$tipo] === false) {
                throw new Exception("Erro ao inserire dados");
            }
           
        }

        return $codigos;
    }


    public static function pegarArquivo($codigo)
    {
        $dados = FilesRepo::pegarArquivo($codigo);
        if($dados === false) {
            throw new Exception("Erro ao consultar banco de dados");
        }
        return $dados;
    }
}