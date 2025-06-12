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
        Schema::create('corretores', function (Blueprint $table) {
            $table->id();
            $table->string('cor_nome');
            $table->enum('cor_tipo_pessoa', ['F', 'J']);
            $table->string('cor_documento');
            $table->string('cor_email');
            $table->string('cor_telefone');
            $table->string('cor_endereco_completo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corretores');
    }
};
