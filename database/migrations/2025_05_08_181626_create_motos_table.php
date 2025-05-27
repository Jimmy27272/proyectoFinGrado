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
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabricante_id')->constrained('fabricantes');
            $table->foreignId('modelo_id')->constrained('modelos');
            $table->integer('year');
            $table->integer('precio');
            $table->integer('kilometros');
            $table->string('vin', 255);
            $table->foreignId('moto_tipo_id')->constrained('moto_tipos');
            $table->foreignId('cilindrada_id')->constrained('cilindradas');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('ciudad_id')->constrained('ciudades');
            $table->string('direccion', 255);
            $table->string('phone', 45);
            $table->longText('descripcion')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motos');
    }
};
