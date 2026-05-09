<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $student_id
 * @property int $guardian_id
 * @property int $relationship_type_id
 * @property int $is_legal_guardian
 * @property int $is_primary_contact
 * @property int|null $lives_with_student
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guardian|null $guardian
 * @property-read \App\Models\RelationshipType|null $relationshipType
 * @property-read \App\Models\Student|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereGuardianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereIsLegalGuardian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereIsPrimaryContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereLivesWithStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereRelationshipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentGuardian whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudentGuardian extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'guardian_id',
        'relationship_type_id',
        'is_legal_guardian',
        'is_primary_contact',
        'lives_with_student',
        'notes'
    ];

    /**
     * Define la relación con el estudiante.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Define la relación con el tutor.
     */
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    /**
     * Define la relación con el tipo de parentesco.
     */
    public function relationshipType()
    {
        return $this->belongsTo(RelationshipType::class);
    }
}
