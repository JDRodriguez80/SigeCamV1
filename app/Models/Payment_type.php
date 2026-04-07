<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_type extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name',
        'is_active'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
