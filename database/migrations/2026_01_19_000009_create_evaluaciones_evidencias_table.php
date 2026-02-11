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
        Schema::create('evaluaciones-evidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evidencia_id')->nullable();
            $table->foreign('evidencia_id')
            ->references('id')
            ->on('evidencias')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->float('puntuacion');
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada']);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones-evidencias');
    }
};
