<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('origin')->insert([
            ['description' => 'Compra'],
            ['description' => 'Nascimento'],
            ['description' => 'Troca']
        ]);

        DB::table('type')->insert([
            ['description' => 'Vaca'],
            ['description' => 'Boi'],
            ['description' => 'Novilha']
        ]);

        DB::table('breed')->insert([
            ['description' => 'Nelore']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
