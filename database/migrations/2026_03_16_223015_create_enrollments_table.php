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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('academic_cycle_id')->constrained('academic_cycles');
            $table->foreignId('group_id')->constrained('groups');
            $table->date('enrollment_date');
            $table->boolean('has_complementary_care')->default(false);
            $table->enum('status', ['pre_inscrito', 'inscrito', 'baja', 'graduado', 'repetidor'])->default('pre_inscrito');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
