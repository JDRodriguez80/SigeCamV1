<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $documentable_type
 * @property int $documentable_id
 * @property int|null $academic_cycle_id
 * @property int $document_type_id
 * @property int $uploaded_by
 * @property string $disk
 * @property string $path
 * @property string $original_name
 * @property string $mime_type
 * @property string $extension
 * @property int $size
 * @property int $is_current
 * @property string|null $issued_at
 * @property string|null $expires_at
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Documents newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documents newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documents query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereAcademicCycleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereDocumentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereDocumentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereIssuedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documents whereUploadedBy($value)
 * @mixin \Eloquent
 */
class Documents extends Model
{
    use HasFactory;
}
