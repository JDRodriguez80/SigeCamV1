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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('second_last_name')->nullable(); // Segundo apellido
            $table->string('curp')->unique();
            $table->enum('gender',['masculino','femenino'])->nullable();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->text('address');
            $table->string('phone');
            $table->foreignId('disability_type_id')->nullable()->constrained('disability_types');
            $table->string('blood_type');
            $table->string('origin_school')->nullable();
            $table->string('pants_size');
            $table->string('shirt_size');
            $table->string('shoe_size');
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->enum('status', ['activo', 'inactivo', 'graduado', 'baja'])->default('activo');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
