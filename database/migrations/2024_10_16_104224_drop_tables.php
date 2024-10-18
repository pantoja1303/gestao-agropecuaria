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
        Schema::dropIfExists('animal_breed');
        Schema::dropIfExists('animal_type');
        Schema::dropIfExists('origins');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
