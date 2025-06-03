<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ciudad;

class CiudadFactory extends Factory
{
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');  // Crea un generador de datos Faker con localización española

        return [
            'name' => $faker->city(),  // Genera un nombre de ciudad aleatorio
            'comunidad_id' => \App\Models\Comunidad::factory(), // Asocia la ciudad a una comunidad existente o crea una nueva si no existe
        ];
    }
}
