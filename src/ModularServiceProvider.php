<?php
namespace LaraLibs\Modular;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Illuminate\Support\ServiceProvider;

class ModularServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        $this->loadViewsFrom(__DIR__.'/Views/', 'modular');

    }

    public function register()
    {
        $this->commands([
            Commands\MakeModule::class
        ]);
    }
}
