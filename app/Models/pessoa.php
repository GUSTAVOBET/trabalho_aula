<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pessoa extends Model
{   
    protected $table = 'pessoas';
    protected $fillable = [
        'pes_nome',
        'pes_cpf',
        'pes_email',
        'pes_telefone',
        'pes_endereco_completo',
    ];
}
