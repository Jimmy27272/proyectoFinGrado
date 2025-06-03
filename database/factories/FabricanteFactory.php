<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fabricante;

class FabricanteFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => fake()->word()  // Genera un nombre aleatorio para el fabricante
        ];
    }
}
