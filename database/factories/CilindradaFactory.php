<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cilindrada;

class CilindradaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Hasta 125cc', '126cc - 500cc', '501cc - 1000cc', 'Más de 1000cc']) // Genera un nombre aleatorio de cilindrada
        ];
    }
}
