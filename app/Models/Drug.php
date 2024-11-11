<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $description Descrição do medicamento
 * @property int $drug_classification_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDrugClassificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Drug extends Model
{
    use HasFactory;

}
