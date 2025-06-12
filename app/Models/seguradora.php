<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class seguradora extends Model
{   
    protected $table = 'seguradoras';
    protected $fillable = [
        'seg_nome',
        'seg_cnpj',
        'seg_email',
        'seg_telefone',
        'seg_endereco_completo',
    ];
}
