<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $order_index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Guardian> $guardians
 * @property-read int|null $guardians_count
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereOrderIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationLevels whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EducationLevels extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'name',
        'order_index',
    ];

    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }
}
