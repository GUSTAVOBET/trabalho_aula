<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Não irei usar essa tabela professor, mas vou deixar ela aqui para caso seja necessário
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipos_cobertura', function (Blueprint $table) {
            $table->id();
            $table->string('tc_nome');
            $table->string('tc_descricao');
            $table->string('tc_tipo');
            $table->boolean('tc_ativo');
            $table->unsignedBigInteger('id_prd');
            $table->foreign('id_prd')->references('id')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_cobertura');
    }
};
