<?php

namespace Kangangga\EasylinkSdk;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class EasylinkSdkServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-easylink');
        Config::set(
            'database.connections.easylink',
            Config::get('laravel-easylink.database')
        );
    }

    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-easylink');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-easylink');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-easylink.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-easylink'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-easylink'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-easylink'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }
}
