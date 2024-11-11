<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $animal_id
 * @property string $administration_date Data da medicação
 * @property string $quantity quantidade aplicada
 * @property string $unit unidade
 * @property string|null $observation
 * @property int $drug_id
 * @property int $status_medication_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereAdministrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereStatusMedicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
