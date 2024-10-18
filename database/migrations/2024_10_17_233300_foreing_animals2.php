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
        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('breed_id')->references('id')->on('breed');
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('origin_id')->references('id')->on('origin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['breed_id']);
            $table->dropForeign(['type_id']);
            $table->dropForeign(['origin_id']);
        });
    }
};
