<?php

namespace CleaniqueCoders\ArtisanExtended\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class Route extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new resourceful route';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Route';

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        $name = ($this->option('p')) ? Str::studly($this->option('p')) . '\\' . $name : $name;
        return ($this->option('a')) ? 'API\\' . $name : $name;
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire()
    {
        parent::fire();
        $name = $this->parseName($this->getNameInput());

        $content = '\\' . $this->getNamespace($name) . '\\' . str_replace($this->getNamespace($name) . '\\', '', $name) . '::routes();' . PHP_EOL;

        file_put_contents(
            base_path('routes/' . ($this->option('a') ? 'api' : 'web') . '.php'),
            $content,
            FILE_APPEND
        );
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        return str_replace([
            'DummyClass',
            'DummyPrefix',
            'DummyMiddleware',
            'DummyRoute',
        ], [
            $this->getClassName($name),
            $this->option('p') ?: '',
            $this->getMiddlewares(),
            $this->getRouteName(),
        ], $stub);
    }

    protected function getClassName($name)
    {
        return str_replace($this->getNamespace($name) . '\\', '', $name);
    }

    protected function getRouteName()
    {
        return Str::plural(Str::slug($this->argument('name')));
    }

    protected function getMiddlewares()
    {
        if (empty($this->option('m'))) {
            return '';
        }

        return "'" . str_replace(",", "','", $this->option('m')) . "'";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/route.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Routes';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['a', 'a', InputOption::VALUE_NONE, 'Create a new API route.'],
            ['p', 'p', InputOption::VALUE_OPTIONAL, 'Set prefix for the given route.'],
            ['m', 'm', InputOption::VALUE_OPTIONAL, 'Set middlewares for the given route.'],
        ];
    }
}
