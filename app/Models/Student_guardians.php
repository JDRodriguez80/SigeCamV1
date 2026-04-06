<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $student_id
 * @property int $guardian_id
 * @property int $relationship_type_id
 * @property int $is_legal_guardian
 * @property int $is_primary_contact
 * @property int|null $lives_with_student
 * @property int $priority_order
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guardian|null $guardian
 * @property-read \App\Models\RelationshipType|null $relationshipType
 * @property-read \App\Models\Student|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians query()
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereGuardianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereIsLegalGuardian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereIsPrimaryContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereLivesWithStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians wherePriorityOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereRelationshipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|student_guardians whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Student_guardians extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'guardian_id',
        'relationship_type_id',
        'is_legal_guardian',
        'is_primary_contact',
        'lives_with_student',
        'priority_order',
        'notes'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function relationshipType()
    {
        return $this->belongsTo(RelationshipType::class);
    }


}
