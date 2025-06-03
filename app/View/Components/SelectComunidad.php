<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Comunidad;

class SelectComunidad extends Component
{
    public Collection $comunidades;
    
    public function __construct()
    {
        $this->comunidades = Comunidad::orderBy('name')->get(); // Obtiene todas las comunidades ordenadas por nombre
    }

    public function render(): View|Closure|string
    {
        return view('components.select-comunidad'); // Retorna la vista del componente select-comunidad.blade.php al utilizar <x-select-comunidad>
    }
}
