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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('second_last_name')->nullable(); // Segundo apellido
            $table->string('curp')->unique();
            $table->date('birth_date');
            $table->foreignId('education_level_id')->nullable()->constrained('education_levels');
            $table->string('occupation');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
