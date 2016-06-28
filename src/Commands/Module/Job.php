<?php

namespace LaraLibs\Modular\Commands\Module;

use LaraLibs\Modular\Commands\Command;

class Job extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module\'s job class';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    }
}
