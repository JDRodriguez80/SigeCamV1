<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $academic_cycle_id
 * @property int $section_id
 * @property int $grade_level_id
 * @property string $name
 * @property string|null $shift
 * @property int $capacity
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AcademicCycle|null $academicCycle
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \App\Models\GradeLevel|null $gradeLevel
 * @property-read \App\Models\Section|null $section
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereAcademicCycleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGradeLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereShift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_cycle_id',
        'section_id',
        'grade_level_id',
        'name',
        'shift',
        'capacity',
        'status'
    ];
    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    //metodo para verificar la capacidad del grupo

    public function hasCapacity()
    {
        return $this->enrollments()->count()< $this->capacity;
    }

    public function student()
    {
        return $this->hasManyThrough(Student::class, Enrollment::class);
    }
}
