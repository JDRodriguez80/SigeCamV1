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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_cycle_id')->constrained('academic_cycles');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('grade_level_id')->constrained('grade_levels');
            $table->string('name');
            $table->enum('shift', ['matutino', 'vespertino'])->nullable();
            $table->unsignedInteger('capacity');
            $table->enum('status', ['active', 'inactive', 'full'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
