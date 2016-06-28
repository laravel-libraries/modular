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
            Commands\Bundle\Console::class,
            Commands\Bundle\Controller::class,
            Commands\Bundle\Middleware::class,
            Commands\Bundle\Model::class,
            Commands\Bundle\Provider::class,
            Commands\Make\Bundle::class,
        ]);
    }
}
