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
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('description')->unique()->comment('Descrição do status (Ativo,Vendido,Morto)'); 
            $table->timestamps();
        });

        Schema::table('animals', function (Blueprint $table) {
            // Adiciona a coluna de chave estrangeira
            $table->unsignedBigInteger('status_id')->nullable()->comment('Referência para o status do animal');
        
            // Define a chave estrangeira
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
