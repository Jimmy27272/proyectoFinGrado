<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MotoFeatures;
use App\Models\Moto;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotoFeatures>
 */
class MotoFeaturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'moto_id' => Moto::inRandomOrder()->first()->id,
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
