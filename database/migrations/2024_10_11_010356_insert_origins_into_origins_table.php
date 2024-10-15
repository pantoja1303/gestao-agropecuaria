<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertOriginsIntoOriginsTable extends Migration
{
    public function up()
    {
        DB::table('origins')->insert([
            ['description' => 'Compra'],
            ['description' => 'Nascimento'],
            ['description' => 'Troca']
        ]);
    }

    public function down()
    {
        DB::table('origins')->truncate(); // Remove todos os dados
    }
}
