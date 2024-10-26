<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    use HasFactory;

     // Defina os campos que podem ser preenchidos no formulário (mass assignment)
     protected $fillable = ['weight', 'weighing_date', 'animal_id'];

     // Definir o relacionamento com a model Animal (cada pesagem pertence a um animal)
     public function animal()
     {
         return $this->belongsTo(Animal::class); // Cada pesagem pertence a um animal
     }
}
