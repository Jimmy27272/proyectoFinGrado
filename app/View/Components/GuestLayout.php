<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class GuestLayout extends Component
{
    public function __construct()
    {
        
    }

    public function render(): View|Closure|string
    {
        return view('layouts.guest'); // Retorna la vista del layout guest.blade.php al utilizar <x-guest-layout>
    }
}
