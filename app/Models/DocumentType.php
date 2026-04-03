<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name',
        'applies_to',
        'requires_cycle',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }
}
