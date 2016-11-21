<?php

namespace CleaniqueCoders\Console\Commands\ArtisanExtended;

use Illuminate\Console\Command;

class Route extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {name} {--api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new resourceful route';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $controller = studly_case(class_basename($name)) . 'Controller';
        $route_name = str_slug(str_plural($name));
        $content = 'Route::resource(\'' . $route_name . '\', \'' . $controller . '\');' . PHP_EOL;
        file_put_contents(
            base_path('routes/' . ($this->option('api') ? 'api' : 'web') . '.php'),
            $content,
            FILE_APPEND
        );
        $this->info('Route created successfully.');
    }
}
