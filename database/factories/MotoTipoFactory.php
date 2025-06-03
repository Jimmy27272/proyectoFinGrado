<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MotoTipo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotoTipo>
 */
class MotoTipoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Scooter', 'Sport', 'Naked', 'Custom', 'Trial', 'Enduro'])  // Genera un nombre aleatorio para el tipo de moto
        ];
    }
}
