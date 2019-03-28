<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.navigation.simpleButtonMenu', 'simpleButtonMenu');
        Blade::component('components.navigation.groupMenu', 'groupMenu');
        Blade::component('components.header.headerIconButton', 'headerIconButton');
    }
}
