<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tp_produto',
        'titulo',
        'descricao',
        'area',
        'valor',
        'imagens'
    ];

}
