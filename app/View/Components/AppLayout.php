<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AppLayout extends Component
{
    public function __construct()
    {
        
    }

    public function render(): View|Closure|string 
    {
        return view('layouts.app'); // Retorna la vista del layout app.blade.php al utilizar <x-app-layout>
    }
}
