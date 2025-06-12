<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cobertura extends Model
{
    protected $table = 'tipos_cobertura';
    protected $fillable = [
        'tc_nome',
        'tc_descricao', 
        'tc_tipo',
        'tc_ativo',
        'id_prd'
    ];
}
