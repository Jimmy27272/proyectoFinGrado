<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Ciudad;

class SelectCiudad extends Component
{
    public Collection $ciudades;

    public function __construct()
    {
        $this->ciudades = Ciudad::orderBy('name')->get(); // Obtiene todas las ciudades ordenadas por nombre
    }

    public function render(): View|Closure|string
    {
        return view('components.select-ciudad'); // Retorna la vista del componente select-ciudad.blade.php al utilizar <x-select-ciudad>
    }
}
