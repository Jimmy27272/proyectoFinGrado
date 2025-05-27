<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comunidad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comunidad>
 */
class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $comunidades = [
            'Andalucía',
            'Aragón',
            'Asturias',
            'Islas Baleares',
            'Canarias',
            'Cantabria',
            'Castilla-La Mancha',
            'Castilla y León',
            'Cataluña',
            'Extremadura',
            'Galicia',
            'Madrid',
            'Murcia',
            'Navarra',
            'País Vasco',
            'La Rioja',
            'Comunidad Valenciana',
            'Ceuta',
            'Melilla',
        ];


        return [
            'name' => $this->faker->randomElement($comunidades),
        ];
    }
}
