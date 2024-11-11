<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $animal_id
 * @property string $weighing_date Data da pesagem
 * @property string $weight Peso do animal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereWeighingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weighing whereWeight($value)
 * @mixin \Eloquent
 */
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
