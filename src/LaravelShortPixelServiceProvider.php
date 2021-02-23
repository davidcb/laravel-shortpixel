<?php

namespace Davidcb\LaravelShortPixel;

use Illuminate\Support\ServiceProvider;

class LaravelShortPixelServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/shortpixel.php' => config_path('shortpixel.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/shortpixel.php', 'shortpixel');

        $this->app->singleton('laravel-shortpixel', function ($app) {
            return new LaravelShortPixel($app);
        });
    }

    public function provides()
    {
        return ['laravel-shortpixel'];
    }
}
