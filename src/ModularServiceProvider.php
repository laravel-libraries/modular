<?php
namespace LaraLibs\Modular;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as APP;

class ModularServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views/', 'modular');
    }

    public function register()
    {
        $commands = [
            // Commands\Module\Console::class,
            // Commands\Module\Controller::class,
            // Commands\Module\Middleware::class,
            // Commands\Module\Model::class,
            // Commands\Module\Provider::class,
            Commands\Make\Module::class,
        ];

        if ((float) APP::VERSION >= (float) 5.2) {
            $commands[] = Commands\Module\Auth::class;
        }

        $this->commands($commands);
    }
}
