<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $student_id
 * @property int $academic_cycle_id
 * @property int $group_id
 * @property string $enrollment_date
 * @property int $has_complementary_care
 * @property string $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AcademicCycle|null $academicCycle
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\Student|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAcademicCycleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEnrollmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereHasComplementaryCare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'academic_cycle_id',
        'group_id',
        'enrollment_date',
        'has_complementary_care',
        'status',
        'notes'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function isActive()
    {
        return $this->status== 'inscrito';
    }
}
