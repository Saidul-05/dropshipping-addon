<?php

namespace YourVendor\DropshippingAddon\Providers;

use Illuminate\Support\ServiceProvider;

class DropshippingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/dropshipping.php', 'dropshipping'
        );
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../config/dropshipping.php' => config_path('dropshipping.php'),
        ], 'dropshipping-config');
    }
}
