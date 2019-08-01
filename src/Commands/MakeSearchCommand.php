<?php

namespace Zhenry\Lsearch\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeSearchCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new search class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Search';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('searchable')) {
            return __DIR__.'/../Stubs/Searchable.stub';
        }

        return __DIR__.'/../Stubs/Filter.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Search";
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['searchable', 's', InputOption::VALUE_NONE, 'Indicates if the generated class should be a searchable class'],
        ];
    }
}
