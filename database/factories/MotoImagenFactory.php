<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Moto;
use App\Models\MotoImagen;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotoImagen>
 */
class MotoImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'moto_id' => 1,
            'imagen_path' => function(array $attributes){
                $moto = Moto::find($attributes['moto_id']);
                return sprintf("https://placehold.co/600x400/gray/white/png?text=%s", $moto->fabricante->name);
            },
            'position' => function(array $attributes){
                return Moto::find($attributes['moto_id'])->images()->count() + 1;
            }
        ];
    }
}
