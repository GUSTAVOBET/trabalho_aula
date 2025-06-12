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
        Schema::create('seguradoras', function (Blueprint $table) {
            $table->id();
            $table->string('seg_nome')->nullable(false);
            $table->string('seg_cnpj')->unique()->nullable(false);
            $table->string('seg_email')->nullable(false);
            $table->string('seg_telefone')->nullable(false);
            $table->string('seg_endereco_completo')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguradoras');
    }
};
