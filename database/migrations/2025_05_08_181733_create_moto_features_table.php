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
        Schema::create('moto_features', function (Blueprint $table) {
            $table->unsignedBigInteger('moto_id')->primary();
            $table->boolean('garantia')->default(0);
            $table->boolean('unico_propietario')->default(0);
            $table->boolean('limitable')->default(0);
            $table->boolean('abs')->default(0);
            $table->boolean('control_crucero')->default(0);
            $table->boolean('bluetooth')->default(0);
            $table->boolean('puños')->default(0);
            $table->boolean('gps')->default(0);
            $table->boolean('alforjas')->default(0);
            $table->boolean('control_traccion')->default(0);
            $table->boolean('led')->default(0);
            $table->boolean('usb')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moto_features');
    }
};
