@extends('layout')

@section('css')
<link href="{{ asset('css/cadastro.css') }}" rel="stylesheet">
@endsection

@section('conteudo')
<div class="box">
  <form class="form" action="{{route('cadastrar_musica')}}" method="POST" enctype="multipart/form-data">  
    @csrf
      <span class="title">Música</span>
      <label for="perfil" class="label">Capa</label>
      <input type="file" id="perfil" name="perfil" accept="image/*">
      <label for="audio" class="label">Audio</label>
      <input type="file" name="audio" accept="audio/*">
      <label for="nome_musica" class="label">Música</label>
      <input type="text" id="nome_musica" name="nome_musica" required="" class="input">
      <label for="autor" class="label">Autor</label>
      <input type="autor" id="autor" name="autor" required="" class="input">
      <button type="submit" class="submit">Pronto !</button>
    </form>
</div>
@endsection