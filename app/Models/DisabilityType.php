<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisabilityType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DisabilityType extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name',
        'description'
    ];

    //relacion con estudiantes

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
