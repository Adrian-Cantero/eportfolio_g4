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
    Schema::create('modulos_formativos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('ciclo_formativo_id')
              ->constrained('ciclos_formativos')
              ->cascadeOnDelete();

        $table->string('nombre');
        $table->string('codigo')->unique();

        $table->integer('horas_totales')->nullable();
        $table->string('curso_escolar')->nullable();
        $table->string('centro')->nullable();

        // Relación con docentes (para la tabla users)
        $table->unsignedBigInteger('docente_id')->nullable();

        $table->text('descripcion')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos_formativos');
    }
};
