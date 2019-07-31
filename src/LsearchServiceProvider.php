<?php

namespace Zhenry\Lsearch;

use Illuminate\Support\ServiceProvider;
use Zhenry\Lsearch\Commands\MakeSearchCommand;

class LsearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeSearchCommand::class,
            ]);
        }
    }
}
