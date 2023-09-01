<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Files;

class Music extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'codigo';
    protected $table = 'musica';
    protected $fillable = [
        'nome_musica',
        'autor',
        'arquivo_audio',
        'arquivo_imagem'
    ];

    public function arquivoImagem()
    {
        return $this->belongsTo(Files::class, 'arquivo_imagem', 'codigo');
    }

    public $timestamps = false;
}