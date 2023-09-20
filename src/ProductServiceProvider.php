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
            __DIR__.'/../database/migrations/create_products_table.php.stub' => $this->getMigrationFileName('create_products_table.php'),
        ], 'permission-migrations');

    }
    protected function getMigrationFileName(string $migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make([$this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR])
            ->flatMap(fn ($path) => $filesystem->glob($path.'*_'.$migrationFileName))
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
