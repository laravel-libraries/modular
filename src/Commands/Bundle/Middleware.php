<?php

namespace LaraLibs\Modular\Commands\Bundle;

use LaraLibs\Modular\Commands\Command;

class Middleware extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bundle:middleware';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new bundle\'s middleware';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    }
}
