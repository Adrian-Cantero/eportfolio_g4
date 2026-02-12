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
        Schema::create('criterios_evaluacion', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('resultado_aprendizaje_id')->nullable();
            $table->foreign('resultado_aprendizaje_id')->references('id')->on('resultados_aprendizaje')->onDelete('cascade');
            $table->string('codigo',50);
            $table->string('descripcion');
            $table->float('peso_porcentaje')->max(100)->min(0);
            $table->integer('orden')->min(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterios_evaluacion');
    }
};
