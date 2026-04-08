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
 * @property string $birth_place
 * @property string $address
 * @property string $phone
 * @property int|null $disability_type_id
 * @property string $blood_type
 * @property string|null $origin_school
 * @property string $pants_size
 * @property string $shirt_size
 * @property string $shoe_size
 * @property string $weight
 * @property string $height
 * @property string $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\AcademicCycle|null $academicCycle
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Documents> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Guardian> $guardians
 * @property-read int|null $guardians_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCurp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDisabilityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereOriginSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePantsSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereShirtSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereShoeSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereWeight($value)
 * @mixin \Eloquent
 */
class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'second_last_name',
        'curp',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'phone',
        'disability_type_id',
        'blood_type',
        'origin_school',
        'pants_size',
        'shirt_size',
        'shoe_size',
        'weight',
        'height',
        'status',
        'notes'
    ];

    public function guardians()
    {
        return $this->belongsToMany(Guardian::class, 'student_guardians')
            ->withPivot('relationship_type_id', 'is_legal_guardian', 'is_primary_contact','lives_with_student','priority_order','notes')
            ->withTimestamps();
    }
    /*Relacion con pagos*/
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    /*Relacion con el ciclo academico*/
    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }

    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }
}
