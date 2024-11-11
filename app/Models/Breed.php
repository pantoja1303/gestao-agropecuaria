<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $description raça do animal (nelore)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Breed extends Model
{
    use HasFactory;

    protected $table = 'breed';
}
