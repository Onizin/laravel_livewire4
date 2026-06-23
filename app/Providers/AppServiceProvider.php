<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $basePath = rtrim(parse_url(config('app.url'), PHP_URL_PATH) ?? '', '/');

        Livewire::setUpdateRoute(function ($handle) use ($basePath) {
            return Route::post($basePath . '/livewire/update', $handle)->middleware('web');
        });
    }
}
