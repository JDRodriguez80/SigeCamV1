<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $payment_id
 * @property string $invoice_number
 * @property string $amount
 * @property string $invoice_date
 * @property string $payment_method
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Payment|null $payment
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'invoice_number',
        'amount',
        'invoice_date',
        'payment_method',
        'notes'
        ];
    /*Relacion con pago*/

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
