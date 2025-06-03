<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MotoFeatures;
use App\Models\Moto;

class MotoFeaturesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'moto_id' => Moto::inRandomOrder()->first()->id, // Asigna una moto aleatoria existente
            'garantia' => fake()->boolean(),
            'unico_propietario' => fake()->boolean(),
            'limitable' => fake()->boolean(),
            'abs' => fake()->boolean(),
            'control_crucero' => fake()->boolean(),
            'bluetooth' => fake()->boolean(),
            'puños' => fake()->boolean(),
            'gps' => fake()->boolean(),
            'alforjas' => fake()->boolean(),
            'control_traccion' => fake()->boolean(),
            'led' => fake()->boolean(),
            'usb' => fake()->boolean(),
        ];
    }
}
