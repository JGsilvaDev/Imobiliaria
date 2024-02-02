<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'finalidade',
        'valor',
        'nome',
        'email',
        'telefone',
        'tpImovel',
        'condominio',
        'endereco',
        'bairro',
        'cidade',
        'observacao'
    ];
}
