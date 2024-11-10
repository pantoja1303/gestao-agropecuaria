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
        Schema::create('medications', function (Blueprint $table) {
            $table->id(); // ID da pesagem
            $table->foreignId('animal_id') // Chave estrangeira para a tabela animals
                ->constrained('animals') // Relaciona com a tabela animals
                ->onDelete('cascade'); // Exclusão em cascata
            $table->date('administration_date')->comment('Data da medicação'); // Data da medicação
            $table->decimal('quantity', 10, 2)->comment('quantidade aplicada'); // Peso atual do animal (10 dígitos no total, 2 casas decimais)
            $table->string('unit')->comment('unidade'); // Peso atual do animal (10 dígitos no total, 2 casas decimais)
            $table->string('observation')->nullable(); // Observação
            $table->foreignId('drug_id') // Chave estrangeira para a tabela drug
            ->constrained('drugs');
            $table->foreignId('status_medication_id') // Chave estrangeira para a tabela status_medication
            ->constrained('status_medications');
            $table->timestamps(); // Campos created_at e updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
