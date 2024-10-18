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
            $table->unsignedBigInteger('breed_id')->nullable()->change();
            $table->unsignedBigInteger('type_id')->nullable()->change();
            $table->unsignedBigInteger('origin_id')->nullable()->change();
        
            $table->foreign('breed_id')->references('id')->on('breed')->change();
            $table->foreign('type_id')->references('id')->on('type')->change();
            $table->foreign('origin_id')->references('id')->on('origin')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
