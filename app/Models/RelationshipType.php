<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $is_legal_guardian_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\student_guardians> $studentGuardians
 * @property-read int|null $student_guardians_count
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereIsLegalGuardianType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationshipType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RelationshipType extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name'
    ];

    public function studentGuardians()
    {
        return $this->hasMany(student_guardians::class);
    }
}
