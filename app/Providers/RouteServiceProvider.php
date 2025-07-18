<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        Route::prefix(LaravelLocalization::setLocale())
            ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
            ->group(function () {
                $this->loadRoutesFrom(base_path('routes/web.php'));
            });
    }
}
