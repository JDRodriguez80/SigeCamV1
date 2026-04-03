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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            //todo hacer las relaciones con padres y alumnos
            $table->morphs('documentable'); // Relación polimórfica (alumno o representante)
            $table->foreignId('academic_cycle_id')->nullable()->constrained('academic_cycles'); // Relación opcional con ciclo académico
            $table->foreignId('document_type_id')->constrained('document_types'); // Relación con tipo de documento
            $table->foreignId('uploaded_by')->constrained('users'); // Usuario que carga el documento
            $table->string('disk'); // Disco donde se almacena el archivo (local, S3, etc.)
            $table->string('path'); // Ruta del archivo
            $table->string('original_name'); // Nombre original del archivo
            $table->string('mime_type'); // Tipo MIME
            $table->string('extension'); // Extensión del archivo
            $table->bigInteger('size'); // Tamaño del archivo
            $table->boolean('is_current')->default(true); // Si el documento es el actual (en caso de actualizar)
            $table->timestamp('issued_at')->nullable(); // Fecha de emisión del documento
            $table->timestamp('expires_at')->nullable(); // Fecha de expiración (si aplica)
            $table->text('notes')->nullable(); // Notas adicionales sobre el documento
            $table->timestamps();
            $table->softDeletes(); // Eliminación suave para mantener registros
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
