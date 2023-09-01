<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'codigo';
    protected $table = 'arquivos';
    protected $fillable = [
        'nome_arquivo',
        'caminho',
        'extensao',
        'tamanho_arquivo'
    ];

    public $timestamps = false;
}