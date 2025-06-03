<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Modelo;

class SelectModelo extends Component
{

    public Collection $modelos;
    
    public function __construct()
    {
        $this->modelos=Modelo::orderBy('name')->get(); // Obtiene todos los modelos ordenados por nombre desde el modelo Modelo
    }

    public function render(): View|Closure|string
    {
        return view('components.select-modelo'); // Retorna la vista del componente select-modelo.blade.php al utilizar <x-select-modelo>
    }
}
