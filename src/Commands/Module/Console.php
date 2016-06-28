<?php

namespace LaraLibs\Modular\Commands\Module;

use Illuminate\Foundation\Console\ConsoleMakeCommand;

class Console extends ConsoleMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:console';

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
    public function getArguments()
    {
        $args = [
            ['module', InputArgument::REQUIRED, 'The module name to use.'],
        ];

        return array_merge_recursive($args, parent::getArguments());
    }
}
