<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Fabricante;

class SelectFabricante extends Component
{

    public Collection $fabricantes;
    
    public function __construct()
    {
        $this->fabricantes = Fabricante::orderBy('name')->get(); // Obtiene todos los fabricantes ordenados por nombre desde el modelo Fabricante
    }

    public function render(): View|Closure|string
    {
        return view('components.select-fabricante'); // Retorna la vista del componente select-fabricante.blade.php al utilizar <x-select-fabricante>
    }
}
