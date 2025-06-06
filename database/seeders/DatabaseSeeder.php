<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\MotoTipo;
use App\Database\Factories\MotoTipoFactory;
use App\Database\Factories\CilindradaFactory;
use App\Database\Factories\ComunidadFactory;
use App\Database\Factories\CiudadFactory;
use App\Database\Factories\FabricanteFactory;
use App\Database\Factories\ModeloFactory;
use App\Database\Factories\UserFactory;
use App\Database\Factories\MotoFactory;
use App\Database\Factories\MotoImagenFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Cilindrada;
use App\Models\Comunidad;
use App\Models\Ciudad;
use App\Models\Fabricante;
use App\Models\Modelo;
use App\Models\Moto;
use App\Models\MotoImagen;
use App\Models\MotoFeatures;







class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MotoTipo::factory() // Crear tipos de moto
            ->sequence(
                ['name' => 'Scooter'],
                ['name' => 'Sport'],
                ['name' => 'Naked'],
                ['name' => 'Custom'],
                ['name' => 'Trial'],
                ['name' => 'Enduro']
            )
            ->count(6)
            ->create();

        Cilindrada::factory() // Crear cilindradas
            ->sequence(
                ['name' => 'Hasta 125cc'],
                ['name' => '126cc - 500cc'],
                ['name' => '501cc - 1000cc'],
                ['name' => 'Más de 1000cc']
            )
            ->count(4)
            ->create();

        $comunidades = [
            'Andalucía' => ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla'],
            'Aragón' => ['Huesca', 'Teruel', 'Zaragoza'],
            'Asturias' => ['Asturias'],
            'Islas Baleares' => ['Islas Baleares'],
            'Canarias' => ['Las Palmas', 'Santa Cruz de Tenerife'],
            'Cantabria' => ['Cantabria'],
            'Castilla-La Mancha' => ['Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo'],
            'Castilla y León' => ['Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
            'Cataluña' => ['Barcelona', 'Girona', 'Lleida', 'Tarragona'],
            'Extremadura' => ['Badajoz', 'Cáceres'],
            'Galicia' => ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
            'Madrid' => ['Madrid'],
            'Murcia' => ['Murcia'],
            'Navarra' => ['Navarra'],
            'País Vasco' => ['Álava', 'Gipuzkoa', 'Bizkaia'],
            'La Rioja' => ['La Rioja'],
            
        ];


        foreach ($comunidades as $comunidad => $ciudades){ // Crear comunidades y sus ciudades
            Comunidad::factory()
                ->state(['name' => $comunidad])
                ->has(
                    Ciudad::factory()
                    ->count(count($ciudades))
                    ->sequence(...array_map(fn($ciudad) => ['name' => $ciudad], $ciudades)),
                    'ciudades'
                )
                ->create();

        };

        $fabricantes = [
            'Honda' => [
                'PCX 125',
        'SH 300i',
        'Forza 750',
        'Integra 750',

        'CBR125R',
        'CBR500R',
        'CBR600RR',
        'RC213V-S',

        'CB125R',
        'CB500F',
        'CB650R',
        'CB1000R',

        'Rebel 125',
        'Rebel 500',
        'Rebel 1100',
        'Gold Wing',

        'Montesa Cota 4RT 260',
        'Montesa Cota 300RR',
        'Montesa Cota 4RT 260',
        'Montesa Cota 4RT 260',

        'CRF125F',
        'CRF250RX',
        'CRF450L',
        'CRF1100L Africa Twin',
            ],
            'Yamaha' =>[
                "Neo's 125",
        'XMAX 300',
        'TMAX 560',
        'TMAX Tech Max',

        'YZF-R125',
        'YZF-R3',
        'YZF-R6',
        'YZF-R1',

        'MT-125',
        'MT-03',
        'MT-07',
        'MT-10',

        'Bolt R-Spec 950',
        'Bolt 950',
        'V Star 950',
        'V-Max',

        'TT-R125LE',
        'TT-R230',
        'YZ250',
        'YZ450F',

        'WR125R',
        'WR250F',
        'WR450F',
        'Super Ténéré 1200',
            ],
          'Kawasaki' => [
        'J125',
        'J300',
        'J500',
        'J1000',

        'Ninja 125',
        'Ninja 400',
        'Ninja ZX-6R',
        'Ninja H2R',

        'Z125',
        'Z400',
        'Z650',
        'Z1000',

        'Vulcan S 650',
        'Vulcan 900 Classic',
        'Vulcan 1700 Vaquero',
        'Vulcan 2000',

        'KX 125',
        'KX 250',
        'KX 450',
        'KX 450',

        'KLX 110',
        'KLX 250',
        'KLX 450',
        'KLR 650',
    ],

    'Suzuki' => [
        'Address 110',
        'Burgman 400',
        'Burgman 650',
        'Burgman 850',

        'GSX-R125',
        'GSX250R',
        'GSX-R600',
        'GSX-R1000',

        'GSX-S125',
        'SV650',
        'GSX-S750',
        'GSX-S1000',

        'Boulevard S40',
        'Boulevard C50',
        'Boulevard M50',
        'Boulevard M109R',

        'TS50',
        'TS125',
        'TS250',
        'TS250',

        'DR-Z125',
        'DR-Z400',
        'DR-Z400SM',
        'V-Strom 1050',
    ],  
];

        foreach ($fabricantes as $fabricante => $modelos) { // Crear fabricantes y sus modelos
            Fabricante::factory()
                ->state(['name' => $fabricante])
                ->has(
                    Modelo::factory()
                    ->count(count($modelos))
                    ->sequence(...array_map(fn($modelo) => ['name' => $modelo], $modelos))
                )
                ->create();
        };

        User::factory() // Crear usuarios
            ->count(3)
            ->create();

        User::factory() // Crear usuarios
            ->count(2)
            ->has(
                Moto::factory() // Crear motos para los usuarios
                ->count(50)
                ->has(
                    MotoImagen::factory() // Crear imágenes para las motos
                    ->count(5)
                    ->sequence(fn(Sequence $sequence) =>
                    ['position' => ($sequence->index) % 5 + 1]),
                    'images'
                    )
                    ->hasFeatures(), // Crear características para las motos
                
                'favouriteMotos' //
            )
            ->create();
        
    }
}


