<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::defaultView('pagination'); // Define la vista por defecto para la paginación
        View::share('year', date('Y')); // Comparte el año actual con todas las vistas

        if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
    }
}
