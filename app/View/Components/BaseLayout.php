<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BaseLayout extends Component
{
    public function __construct()
    {
        
    }

    public function render(): View|Closure|string
    {
        return view('layouts.base'); // Retorna la vista del layout base.blade.php al utilizar <x-base-layout>
    }
}
