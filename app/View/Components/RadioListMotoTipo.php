<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\MotoTipo;

class RadioListMotoTipo extends Component
{
     public Collection $MotoTipos;

    public function __construct()
    {
        $this->MotoTipos = MotoTipo::orderBy('name')->get(); // Obtiene todos los tipos de moto ordenados por nombre desde el modelo MotoTipo
    }

    public function render(): View|Closure|string
    {
        return view('components.radio-list-moto-tipo'); // Retorna la vista del componente radio-list-moto-tipo.blade.php al utilizar <x-radio-list-moto-tipo>
    }
}
