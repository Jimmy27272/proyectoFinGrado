<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\MotoTipo;

class SelectMotoTipo extends Component
{
    public Collection $MotoTipos;
    
    public function __construct()
    {
        $this->MotoTipos = MotoTipo::orderBy('name')->get(); // Obtiene todos los tipos de moto ordenados por nombre desde el modelo MotoTipo
    }

    public function render(): View|Closure|string
    {
        return view('components.select-moto-tipo'); // Retorna la vista del componente select-moto-tipo.blade.php al utilizar <x-select-moto-tipo>
    }
}
