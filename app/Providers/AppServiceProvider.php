<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use URL;

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
        Blade::component('layouts.CustomerLayout', 'customer-layout');
        Blade::component('layouts.MeowinnLayout', 'meowinn-layout');
        Blade::component('layouts.PetHouseLayout', 'pethouse-layout');
        if (env("APP_ENV") === "production") {
            URL::forceScheme("https");
        }
    }
}
