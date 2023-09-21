<?php

namespace Product\Category;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
      
        $this->publishes([
            __DIR__.'/routes' => base_path('routes'),
        ]);
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views'),
        ]);
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'my-package-migrations');
    }
}
