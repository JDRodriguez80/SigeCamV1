<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments'); // Relación con el pago realizado
            $table->string('invoice_number')->unique(); // Número de factura (puede ser generado automáticamente)
            $table->decimal('amount', 10, 2); // Monto total del pago
            $table->date('invoice_date'); // Fecha de emisión del recibo
            $table->string('payment_method'); // Método de pago (Efectivo, Transferencia, etc.)
            $table->text('notes')->nullable(); // Notas adicionales (por ejemplo, comentarios)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
