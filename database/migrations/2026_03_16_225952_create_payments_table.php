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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('academic_cycle_id')->constrained('academic_cycles');
            $table->foreignId('payment_type_id')->constrained('payment_types'); // Abono o liquidación
            $table->decimal('amount', 10, 2); // Monto del pago
            $table->decimal('remaining_balance', 10, 2)->default(0); // Saldo restante después del pago
            $table->decimal('discount', 10, 2)->nullable();
            $table->date('payment_date'); // Fecha del pago
            $table->boolean('is_full_payment')->default(false); // Si el pago es total
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
