<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $ear_tag_number
 * @property int|null $breed_id
 * @property int|null $type_id
 * @property int|null $origin_id
 * @property string|null $purchase_date
 * @property string $birth_date Data do nascimento do animal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $status_id Referência para o status do animal
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medication> $medication
 * @property-read int|null $medication_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Weighing> $weighings
 * @property-read int|null $weighings_count
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereEarTagNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereOriginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['ear_tag_number', 'breed_id', 'type_id', 'origin_id','status_id','purchase_date','birth_date'];

     // Definir o relacionamento com a model Weighing (um animal pode ter muitas pesagens)
     public function weighings()
     {
         return $this->hasMany(Weighing::class); // Um animal tem muitas pesagens
     }

        // Definir o relacionamento com a model Weighing (um animal pode ter muitas pesagens)
        public function medication()
        {
            return $this->hasMany(Medication::class); // Um animal tem muitas pesagens
        }
     

}
