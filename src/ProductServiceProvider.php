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
      
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/../views', 'inspire');
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'my-package-migrations');
    }
}
