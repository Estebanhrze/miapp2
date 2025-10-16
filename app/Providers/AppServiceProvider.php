<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Usar Bootstrap en la paginación de Laravel
        Paginator::useBootstrapFive();

        // Opcional: forzar HTTPS en producción
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        // Opcional: zona horaria global
        date_default_timezone_set('America/Guayaquil');
    }
}
