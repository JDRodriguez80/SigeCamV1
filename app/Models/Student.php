<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'notes',
        'photo' // Añadido el nuevo campo de foto
    ];

    public function guardians()
    {
        return $this->belongsToMany(Guardian::class, 'student_guardians')
            ->withPivot('relationship_type_id', 'is_legal_guardian', 'is_primary_contact','lives_with_student','notes')
            ->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }

    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }

    public function disabilityType()
    {
        return $this->belongsTo(DisabilityType::class);
    }
}
