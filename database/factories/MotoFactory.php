<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fabricante;
use App\Models\Model;
use Illuminate\Support\Str;
use App\Models\Moto;
use App\Models\MotoTipo;
use App\Models\Cilindrada;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Modelo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moto>
 */
class MotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $fabricante = Fabricante::inRandomOrder()->first() ?? Fabricante::factory()->create();
    $modelo = Modelo::where('fabricante_id', $fabricante->id)->inRandomOrder()->first()
        ?? Modelo::factory()->create(['fabricante_id' => $fabricante->id]);

    $user = User::inRandomOrder()->first() ?? User::factory()->create();
    $ciudad = Ciudad::inRandomOrder()->first() ?? Ciudad::factory()->create();

    return [
        'fabricante_id' => $fabricante->id,
        'modelo_id' => $modelo->id,
        'year' => fake()->year,
        'precio' => ((int) fake()->randomFloat(2, 5, 100)) * 1000,
        'vin' => strtoupper(Str::random(17)),
        'kilometros' => ((int) fake()->randomFloat(2, 5, 500)) * 1000,
        'moto_tipo_id' => MotoTipo::inRandomOrder()->first()?->id ?? MotoTipo::factory()->create()->id,
        'cilindrada_id' => Cilindrada::inRandomOrder()->first()?->id ?? Cilindrada::factory()->create()->id,
        'user_id' => $user->id,
        'ciudad_id' => $ciudad->id,
        'direccion' => fake()->address,
        'phone' => $user->phone ?? fake()->phoneNumber,
        'descripcion' => fake()->text(2000),
        'published_at' => fake()->optional(0.9)->dateTimeBetween('-1 month', '+1 day'),
    ];
}

}
