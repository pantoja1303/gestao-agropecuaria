<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

         // Defina os campos que podem ser preenchidos no formulário (mass assignment)
         protected $fillable = ['administration_date', 'quantity','unit','observation','drug_id', 'status_medication_id', 'animal_id'];

         // Definir o relacionamento com a model Animal (cada medicamento pertence a um animal)
         public function animal()
         {
             return $this->belongsTo(Animal::class);
         }
    
}
