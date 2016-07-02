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
            Commands\Make\Module::class,
        ];

        $version = trim(str_replace('(LTS)', '', APP::VERSION));

        if ((float) $version >= (float) 5.2) {
            $commands[] = Commands\Module\Auth::class;
            // $commands[] = Commands\Module\Console::class;
            // $commands[] = Commands\Module\Controller::class;
            // $commands[] = Commands\Module\Middleware::class;
            // $commands[] = Commands\Module\Model::class;
            // $commands[] = Commands\Module\Provider::class;
        }

        $this->commands($commands);
    }
}
