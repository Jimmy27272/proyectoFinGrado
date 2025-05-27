<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cilindrada;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cilindrada>
 */
class CilindradaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Hasta 125cc', '126cc - 500cc', '501cc - 1000cc', 'Más de 1000cc'])
        ];
    }
}
