<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Moto;
use App\Models\MotoImagen;


class MotoImagenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'moto_id' => 1, 
            'imagen_path' => function(array $attributes){
                $moto = Moto::find($attributes['moto_id']);
                return sprintf("https://placehold.co/600x400/gray/white/png?text=%s", $moto->fabricante->name); // Genera una URL de imagen de marcador de posición con el nombre del fabricante
            },
            'position' => function(array $attributes){
                return Moto::find($attributes['moto_id'])->images()->count() + 1; // Asigna una posición basada en la cantidad de imágenes existentes para esa moto
            }
        ];
    }
}
