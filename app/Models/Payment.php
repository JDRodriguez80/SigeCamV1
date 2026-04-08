<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\PaymentType;
use App\Models\Invoice;
use App\Models\AcademicCycle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $student_id
 * @property int $payment_type_id
 * @property string $amount
 * @property string $remaining_balance
 * @property string $payment_date
 * @property int $is_full_payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invoice|null $invoice
 * @property-read \App\Models\PaymentType|null $paymentType
 * @property-read \App\Models\Student|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereIsFullPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRemainingBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use HasFactory;
    protected $fillable =[
      'student_id',
      'payment_type_id',
        'academic_cycle_id',
      'amount',
        'remaining_balance',
        'discount',
        'payment_date',
        'is_full_payment'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);

    }
    /*Relacion con el tipo de pago*/
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);

    }
    /*relacion con facturas*/
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }
}
