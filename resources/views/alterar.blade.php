@extends('layout')

@section('css')
<link href="{{ asset('css/cadastro.css') }}" rel="stylesheet">
@endsection

@section('conteudo')
<div class="box">
  <form class="form" action="{{route('alterar')}}" method="POST" >  
    @csrf
      <span class="title">Alterar Música</span>
      <input type="hidden" name="codigo" value="{{$dados->codigo}}">
      <input type="hidden" name="audio" value="{{$dados->arquivo_audio}}">
      <input type="hidden" name="perfil" value="{{$dados->arquivo_imagem}}">
      <label for="nome_musica" class="label">Música</label>
      <input type="text" id="nome_musica" name="nome_musica" required="" class="input" value="{{$dados->nome_musica}}">
      <label for="autor" class="label">Autor</label>
      <input type="autor" id="autor" name="autor" required="" class="input" value="{{$dados->autor}}">
      <button type="submit" class="submit">Alterar !</button>
      <a href="{{route('deletar', ['musica' => $dados->codigo])}}" class="submit"> Deletar ! </a>
    </form>
</div>
@endsection