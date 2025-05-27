<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ciudad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciudad>
 */
class CiudadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            'name' => $faker->city(),
            'comunidad_id' => \App\Models\Comunidad::factory(),
        ];
    }
}
