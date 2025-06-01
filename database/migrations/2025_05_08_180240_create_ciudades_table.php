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
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id(); // ID de la ciudad
            $table->foreignId('comunidad_id')->constrained('comunidades');// Relación con la tabla comunidades
            $table->string('name', 45); // Nombre de la ciudad
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudades'); // Eliminar la tabla ciudades
    }
};
