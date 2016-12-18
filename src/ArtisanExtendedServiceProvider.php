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
        $commands = [];

        // commands available on console and web app
        $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Cache::class;

        // register commands only when application is running in console mode
        if ($this->app->runningInConsole()) {

            // register all commands that can be use during local, staging and production
            // $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Cache::class;

            // register commands that running on local and staging
            if ($this->app->environment('local', 'staging')) {
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Cache::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Clear\Serve::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Database\Setup::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Secure\Cookie::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Common::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\EventListener::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Route::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\View::class;
                $commands[] = \CleaniqueCoders\ArtisanExtended\Console\Commands\Controller::class;
            }

            $this->commands($commands);
        }

        $this->publishes([
            dirname(__FILE__) . '/resources/views' => resource_path('views'),
        ], 'artisan-extended-views');
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
