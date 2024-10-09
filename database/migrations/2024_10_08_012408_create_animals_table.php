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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->integer('ear_tag_number');
            $table->integer('id_breed')->comment('Id da raça do animal');
            $table->integer('type_of_animal')->comment('Tipo do animal (vaca,boi,novilha)');
            $table->integer('origin')->comment('Origem do animal (compra,nascimento,troca)');
            $table->date('purchase_date')->comment('Data da compra do animal');
            $table->date('birth_date')->comment('Data do nascimento do animal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
