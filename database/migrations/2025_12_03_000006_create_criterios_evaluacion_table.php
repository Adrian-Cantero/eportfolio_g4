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
        Schema::create('criterios-evaluacion', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('resultado_aprendizaje_id')->nullable();
                $table->foreign('resultado_aprendizaje_id')->references('id')->on('resultados-aprendizaje')->onDelete('cascade');
            $table->string('codigo',50);
            $table->string('descripcion');
            $table->unsignedInteger('peso_porcentaje')->nullable();
            $table->integer('orden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterios-evaluacion');
    }
};
