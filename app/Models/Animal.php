<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['ear_tag_number', 'id_breed', 'type_of_animal', 'origin','purchase_date','birth_date'];

        // Função que retorna as opções de origem
        public static function origins()
        {
            return [
                'local' => 'Local',
                'imported' => 'Imported',
            ];
        }
}
