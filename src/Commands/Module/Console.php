<?php

namespace LaraLibs\Modular\Commands\Module;

use LaraLibs\Modular\Commands\Command;

class Console extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:console module name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module\'s Artisan command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    }
}
