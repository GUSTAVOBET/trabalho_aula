<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class corretor extends Model
{
    protected $table = 'corretores';
    protected $fillable = [
        'cor_nome',
        'cor_tipo_pessoa',
        'cor_documento',
        'cor_email',
        'cor_telefone',
        'cor_endereco_completo',
    ];
}
