<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'prd_tipos_cobertos',
        'prd_nome',
        'id_seg',
        'prd_sacas_garantia',
        'prd_valor_segurado_por_ha', 
        'prd_sacas_valor',
        'prd_descricao',
        'prd_risco_nomeado_geada',
        'prd_risco_nomeado_granizo',
    ];
}
