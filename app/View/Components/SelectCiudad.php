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
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->ciudades = Ciudad::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-ciudad');
    }
}
