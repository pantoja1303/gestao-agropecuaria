<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $description Descrição do status da medicação (Realizada,pendente)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusMedication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StatusMedication extends Model
{
    use HasFactory;
}
