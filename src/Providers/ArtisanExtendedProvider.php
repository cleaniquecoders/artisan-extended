<?php

namespace CleaniqueCoders\Providers;

use Illuminate\Support\ServiceProvider;

class ArtisanExtendedProvider extends ServiceProvider
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
                \CleaniqueCoders\Console\Commands\ArtisanExtended\Clear\Cache::class,
                \CleaniqueCoders\Console\Commands\ArtisanExtended\Clear\Serve::class,
                \CleaniqueCoders\Console\Commands\ArtisanExtended\Route::class,
                \CleaniqueCoders\Console\Commands\ArtisanExtended\Common::class,
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
