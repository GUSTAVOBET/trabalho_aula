<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->string('prp_numero_proposta');
            $table->string('prp_numero_contrato');
            $table->string('prp_numero_contrato_seguradora');
            $table->unsignedBigInteger('id_cor');
            $table->unsignedBigInteger('id_seg');
            $table->unsignedBigInteger('id_prd');
            $table->float('prp_valor_proposta');
            $table->integer('prp_numero_proposta_hequitar');
            $table->foreign('id_cor')->references('id')->on('corretores');
            $table->foreign('id_seg')->references('id')->on('seguradoras');
            $table->foreign('id_prd')->references('id')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propostas');
    }
};
