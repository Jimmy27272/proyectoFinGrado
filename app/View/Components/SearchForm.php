<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SearchForm extends Component
{
    public function __construct(  
    )
    { 

    }

    public function render(): View|Closure|string
    {
        return view('components.search-form'); // Retorna la vista del componente search-form.blade.php al utilizar <x-search-form>
    }

}
