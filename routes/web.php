<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MusicaController::class, 'index'])->name('index');

Route::get('/cadastro',[MusicaController::class, 'cadastro'])
    ->name('cadastro');

Route::post("/cadastrar", [MusicaController::class, 'cadastrar'])
    ->name('cadastrar_musica');

Route::get('/editar/{musica}', [MusicaController::class, 'editar'])->name('editar');

Route::post('/editar', [MusicaController::class, 'alterar'])->name('alterar');

Route::get('/deletar/{musica}', [MusicaController::class, 'deletar'])->name('deletar');

Route::get('/audio/{id}', [MusicaController::class, 'pegarArquivoMusica']);