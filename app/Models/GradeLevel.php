<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $section_id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $groups
 * @property-read int|null $groups_count
 * @property-read \App\Models\Section|null $section
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeLevel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GradeLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'name',
        'order_index',
        'is_active'
    ];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Relación con los grupos
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Relación con las inscripciones (por grado y sección)
     */
    public function enrollments()
    {
        return $this->hasManyThrough(Enrollment::class, Group::class);
    }

    /**
     * Método para verificar si el nivel de grado está activo
     */
    public function isActive()
    {
        return $this->is_active;
    }
}
