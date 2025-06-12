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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->enum('prd_tipos_cobertos', ['Multirrisco', 'Risco Nomeado'])->nullable();
            $table->string('prd_nome')->nullable();
            $table->unsignedBigInteger('id_seg')->nullable();
            $table->float('prd_sacas_garantia')->nullable();
            $table->float('prd_valor_segurado_por_ha')->nullable();
            $table->float('prd_sacas_valor')->nullable();
            $table->longText('prd_descricao')->nullable();
            $table->boolean('prd_risco_nomeado_geada')->nullable();
            $table->boolean('prd_risco_nomeado_granizo')->nullable();
            $table->foreign('id_seg')->references('id')->on('seguradoras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
