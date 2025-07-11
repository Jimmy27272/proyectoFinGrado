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
        Schema::create('moto_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moto_id')->constrained('motos');
            $table->string('imagen_path', 255);
            $table->integer('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moto_imagenes');
    }
};
