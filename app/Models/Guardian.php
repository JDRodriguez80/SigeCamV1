<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string|null $second_last_name
 * @property string $curp
 * @property string $birth_date
 * @property int|null $education_level_id
 * @property string $occupation
 * @property string $phone
 * @property string|null $email
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Documents> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereCurp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereEducationLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereSecondLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'second_last_name',
        'curp',
        'birth_date',
        'education_level_id',
        'occupation',
        'phone',
        'email',
        'address'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_guardians')
            ->withPivot('relationship_type_id','is_legal_guardian', 'is_primary_contact','lives_with_student', 'notes')
            ->withTimestamps();
    }
    /*Relacion con los documentos*/
    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevels::class);
    }
}
