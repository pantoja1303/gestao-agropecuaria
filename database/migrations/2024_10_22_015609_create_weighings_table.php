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
        Schema::create('weighings', function (Blueprint $table) {
            $table->id(); // ID da pesagem
            $table->foreignId('animal_id') // Chave estrangeira para a tabela animals
                ->constrained('animals') // Relaciona com a tabela animals
                ->onDelete('cascade'); // Exclusão em cascata
            $table->date('weighing_date')->comment('Data da pesagem'); // Data da pesagem
            $table->decimal('weight', 8, 2)->comment('Peso do animal'); // Peso atual do animal (8 dígitos no total, 2 casas decimais)
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weighings');
    }
};
