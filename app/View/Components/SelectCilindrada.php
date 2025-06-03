<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Cilindrada;

class SelectCilindrada extends Component
{
    public Collection $cilindradas;
    
    public function __construct()
    {
        $this->cilindradas= Cilindrada::orderBy('name')->get(); // Obtiene todas las cilindradas ordenadas por nombre desde el modelo Cilindrada
    }

    public function render(): View|Closure|string
    {
        return view('components.select-cilindrada'); // Retorna la vista del componente select-cilindrada.blade.php al utilizar <x-select-cilindrada>
    }
}
