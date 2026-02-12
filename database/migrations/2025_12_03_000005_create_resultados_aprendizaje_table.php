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
        Schema::create('resultados_aprendizaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modulo_formativo_id')->nullable();
            $table->string('codigo', 50);
            $table->string('descripcion');
            $table->float('peso_porcentaje')
                ->nullable()
                ->check('peso_porcentaje >= 0 AND peso_porcentaje <= 100');
            $table->integer('orden')->check('orden >= 1');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('resultados_aprendizaje');
    }
};
