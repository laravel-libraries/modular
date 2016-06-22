<?php
namespace LaraLibs\Modular;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class ModularServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views/', 'modular');

        Storage::extend('local', function($app, $config) {
            $client = new Local(base_path());

            return new Filesystem($client);
        });
    }

    public function register()
    {
        $this->commands([
            Commands\MakeModule::class
        ]);
    }
}
