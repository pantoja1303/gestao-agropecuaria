<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $description Descrição da origem (compra,nascimento,troca)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Origin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Origin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Origin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Origin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Origin whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Origin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Origin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Origin extends Model
{
    use HasFactory;

    protected $table = 'origin';
}
