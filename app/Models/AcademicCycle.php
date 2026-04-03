<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $cycle_cost
 * @property string $start_date
 * @property string $end_date
 * @property int $is_current
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereCycleCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicCycle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AcademicCycle extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'cycle_name',
        'start_date',
        'end_date',
        'status',
        'cycle_cost',
        'is_current'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    //metodo para verificar el ciclo es el actual

    public function isCurrentCycle()
    {
        $currentDate= now();
        return $currentDate->between($this->start_date, $this->end_date );
    }
}
