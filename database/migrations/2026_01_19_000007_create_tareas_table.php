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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterio_evaluacion_id');
            $table->date('fecha_apertura');
            $table->date('fecha_cierre');
            $table->boolean('activo')->default(true);
            $table->text('enunciado');
            $table->timestamps();

            $table->foreign('criterio_evaluacion_id')->references('id')->on('criterios_evaluacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
