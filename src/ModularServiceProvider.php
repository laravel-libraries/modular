<?php
namespace LaraLibs\Modular;

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
            Commands\Module\Auth::class,
            // Commands\Module\Console::class,
            // Commands\Module\Controller::class,
            // Commands\Module\Middleware::class,
            // Commands\Module\Model::class,
            // Commands\Module\Provider::class,
            Commands\Make\Module::class,
        ]);
    }
}
