<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proposta extends Model
{
    protected $table = 'propostas';
    protected $fillable = [
        'prp_numero_proposta',
        'prp_numero_contrato',
        'prp_numero_contrato_seguradora',
        'id_cor',
        'id_seg',
        'id_prd',
        'prp_valor_proposta',
        'prp_numero_proposta_hequitar',
    ];
}
