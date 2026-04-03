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
        Schema::create('academic_cycles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('cycle_cost', 10, 2); // Costo del ciclo escolar
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current')->default(false);
            $table->enum('status',['activo', 'inactivo', 'archivado'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_cycles');
    }
};
