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
        Schema::table('ciclos-formativos', function (Blueprint $table) {
            $table->dropColumn('familia_profesional_id');
        });
        Schema::table('ciclos-formativos', function (Blueprint $table) {
            $table->unsignedBigInteger('familia_profesional_id')->after('id');
            $table->foreign('familia_profesional_id')->references('id')->on('familias-profesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciclos-formativos', function (Blueprint $table) {
            $table->dropForeign(['familia_profesional_id']);
            $table->dropColumn('familia_profesional_id');
        });
    }
};
