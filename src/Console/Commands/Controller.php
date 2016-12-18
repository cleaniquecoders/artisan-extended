<?php

namespace CleaniqueCoders\ArtisanExtended\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class Controller extends ControllerMakeCommand
{
    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);
        $model = str_replace('Controller', '', $class);
        $var = Str::snake(Str::singular($model));
        $view = Str::plural(Str::slug($model));
        $route = $view;

        return str_replace([
            'DummyClass',
            'DummyModel',
            'DummyVar',
            'DummyView',
            'DummyRoute',
        ], [
            $class,
            $model,
            $var,
            $view,
            $route,
        ], $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('resource')) {
            return __DIR__ . '/stubs/controller.stub';
        }

        if ($this->option('resourceful')) {
            return __DIR__ . '/stubs/controller.resourceful.stub';
        }

        return __DIR__ . '/stubs/controller.plain.stub';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['crud', 'c', InputOption::VALUE_NONE, 'Generate a CRUD controller class.'],
            ['resource', 'r', InputOption::VALUE_NONE, 'Generate a resource controller class.'],
        ];
    }
}
