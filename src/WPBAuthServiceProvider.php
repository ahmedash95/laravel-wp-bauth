<?php

namespace AhmedAsh95\WPBAuth;

use Illuminate\Support\ServiceProvider;

class WPBAuthServiceProvider extends ServiceProvider
{

    /**
     * Publish config file.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/wp-bauth.php' => config_path('wp-bauth.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/wp-bauth.php', 'wp-bauth');

        $this->app->singleton('wp-bauth', function ($app) {
            $config = $app['config']['wp-bauth'];
            return new WPBAuth($config);
        });
    }

}