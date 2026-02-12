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
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->unsignedBigInteger('criterio_evaluacion_id')->nullable();
            $table->string('url');
            $table->string('descripcion');
            $table->enum('estado_validacion',['pendiente', 'validada', 'rechazada']) ->default('pendiente');
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('criterio_evaluacion_id')->references('id')->on('criterios_evaluacion')->onDelete('set null');
            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};
