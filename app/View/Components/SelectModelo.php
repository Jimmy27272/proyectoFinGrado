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
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->modelos=Modelo::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-modelo');
    }
}
