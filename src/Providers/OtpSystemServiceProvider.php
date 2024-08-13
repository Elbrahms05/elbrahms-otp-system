<?php

namespace vendor\OtpSystem\Providers;

use Illuminate\Support\ServiceProvider;

class OtpSystemServiceProvider extends ServiceProvider

{
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/otpsystem.php' => config_path('otpsystem.php'),
        ], 'config');
    }

    public function register()
    {
        // Register package config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/otpsystem.php', 'otpsystem'
        );

        // Register the main class to use with the facade
        $this->app->singleton('otpsystem', function () {
            return new \vendor\OtpSystem\OtpSystem;
        });
    }
}
