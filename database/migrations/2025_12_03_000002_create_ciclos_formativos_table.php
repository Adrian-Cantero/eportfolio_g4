<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
     {
        Schema::create('ciclos_formativos', function (Blueprint $table) {
            $table->id();
            $table -> integer('familia_profesional_id')->nullable();
            $table -> string('nombre', 255);
            $table -> string('codigo', 50)->unique();
            $table->enum('grado', ['basico', 'medio', 'superior']);
            $table -> string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ciclos_formativos');
    }
};
