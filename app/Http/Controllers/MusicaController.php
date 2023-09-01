<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use App\Services\File\FileService;
use App\Services\Music\MusicService;
use Exception;

class MusicaController extends Controller
{
    public function index (Request $request)
    {
        try{

            $retornoMusicas = MusicService::pegarMusicas();
            return view('index', ["musicas" => $retornoMusicas]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function cadastro(Request $request)
    {
        return view('cadastro');
    }

    public function cadastrar(Request $request) {
        try {
            $dados = $request->all();
            $arquivos = ["audio" => $request->file('audio'), "perfil" => $request->file('perfil')];
            $retornoArquivos = FileService::salvarArquivo($arquivos);
            $dados['audio'] = $retornoArquivos['audio']->codigo;
            $dados['perfil'] = $retornoArquivos['perfil']->codigo;

            MusicService::salvarMusica($dados);
            return redirect()->route('index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function alterar(Request $request) {
        try {
            $dados = $request->all();
            MusicService::salvarMusica($dados);
            return redirect()->route('index');
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function deletar($codigo) {
        try {
            MusicService::deletar($codigo);

            return redirect()->route('index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function editar($codigo) {
        try {
            $dados = MusicService::pegarMusica($codigo);
            return view('alterar', ["dados" => $dados]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function pegarArquivoMusica($codigoArquivo) 
    {
        try {
            $retorno = FileService::pegarArquivo($codigoArquivo);
            return response()->file($retorno->caminho);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
}
