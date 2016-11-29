<?php

namespace CleaniqueCoders\ArtisanExtended;

use Illuminate\Support\ServiceProvider;

class ArtisanExtendedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Cache::class,
                \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Serve::class,
                \CleaniqueCoders\ArtisanExtended\Console\Commands\Route::class,
                \CleaniqueCoders\ArtisanExtended\Console\Commands\Common::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
