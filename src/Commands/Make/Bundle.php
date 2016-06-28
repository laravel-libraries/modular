<?php

namespace LaraLibs\Modular\Commands\Make;

use LaraLibs\Modular\Commands\Command;
use Illuminate\Support\Facades\Storage;

class Bundle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:bundle {bundle_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new bundle';

    /**
     * The stub files and save path
     *
     * @return array
     */
    protected function files($moduleName)
    {
        $stubPath = dirname(dirname(dirname(__DIR__))).'/stubs';

        return [
            $stubPath.'/publicIndex.stub'                    => 'public/'.$moduleName.'.php',
            $stubPath.'/Console/Kernel.stub'                 => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Console/Kernel.php',
            $stubPath.'/Controllers/Controller.stub'         => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Controllers/Controller.php',
            $stubPath.'/Exceptions/Handler.stub'             => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Exceptions/Kernel.php',
            $stubPath.'/Http/Kernel.stub'                    => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Http/Kernel.php',
            $stubPath.'/Http/routes.stub'                    => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Http/routes.php',
            $stubPath.'/Providers/RouteServiceProvider.stub' => $this->baseFolder.'/'.$this->toNamespace($moduleName).'/Providers/RouteServiceProvider.php',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $moduleName = $this->argument('bundle_name');

        foreach ($this->files($moduleName) as $stub => $savePath) {

            // change the stub contents
            $content = strtr(file_get_contents($stub), [
                '{namespace}'     => $this->toNamespace($moduleName),
                '{baseNamespace}' => $this->toNamespace($this->baseFolder),
            ]);

            Storage::disk('local')->put($savePath, $content);
        }

        $this->line("Module {$moduleName} has been generated.");
        $this->line("  Add this to your config/app.php@providers");
        $this->info("  {$this->toNamespace($this->baseFolder)}\\{$this->toNamespace($moduleName)}\\Providers\\RouteServiceProvider::class");
    }
}
