<?php

namespace LaraLibs\Modular\Commands\Make;

use LaraLibs\Modular\Commands;
use Illuminate\Support\Facades\Storage;

class Module extends Commands\Command
{
    use Commands\NamespaceConverterTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

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
            $stubPath.'/Console/Kernel.stub'                 => 'modules/'.$this->toNamespace($moduleName).'/Console/Kernel.php',
            $stubPath.'/Exceptions/Handler.stub'             => 'modules/'.$this->toNamespace($moduleName).'/Exceptions/Kernel.php',
            $stubPath.'/Http/Controllers/Controller.stub'    => 'modules/'.$this->toNamespace($moduleName).'/Http/Controllers/Controller.php',
            $stubPath.'/Http/Kernel.stub'                    => 'modules/'.$this->toNamespace($moduleName).'/Http/Kernel.php',
            $stubPath.'/Http/routes.stub'                    => 'modules/'.$this->toNamespace($moduleName).'/Http/routes.php',
            $stubPath.'/Providers/RouteServiceProvider.stub' => 'modules/'.$this->toNamespace($moduleName).'/Providers/RouteServiceProvider.php',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $moduleName = $this->argument('name');

        foreach ($this->files($moduleName) as $stub => $savePath) {

            // change the stub contents
            $content = strtr(file_get_contents($stub), [
                '{namespace}'     => $this->toNamespace($moduleName),
                '{baseNamespace}' => $this->toNamespace('modules'),
            ]);

            Storage::disk('local')->put($savePath, $content);
        }

        $this->line("Module {$moduleName} has been generated.");
        $this->line("  Add this to your config/app.php@providers");
        $this->info("  {$this->toNamespace('modules\\'.$moduleName)}\\Providers\\RouteServiceProvider::class");
    }
}
