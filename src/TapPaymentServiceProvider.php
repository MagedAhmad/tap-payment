<?php

namespace MagedAhmad\TapPayment;

use Illuminate\Support\ServiceProvider;
use MagedAhmad\TapPayment\Services\ChargeService;
use MagedAhmad\TapPayment\Services\SubscribeService;
use MagedAhmad\TapPayment\Controllers\ChargeController;
use MagedAhmad\TapPayment\Controllers\SubscribeController;

class TapPaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tap-payment');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tap-payment');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('tap-payment.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tap-payment'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/tap-payment'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/tap-payment'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/tap-payment.php', 'tap-payment');

        // Register the main class to use with the facade
        $this->app->singleton('tap-payment', function () {
            return new TapPayment;
        });

        $this->app->singleton('tap-charge', function () {
            return new ChargeController(new ChargeService());
        });

        $this->app->singleton('tap-subscribe', function () {
            return new SubscribeController(new SubscribeService());
        });
    }
}
