<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
