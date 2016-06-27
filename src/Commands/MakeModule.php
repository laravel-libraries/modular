<?php

namespace LaraLibs\Modular\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

class MakeModule extends Command
{
    /**
     * The module namespace to use
     *
     * @var string
     */
    private $moduleNamespace;

    /**
     * The module name to use
     *
     * @var string
     */
    private $moduleName;

    /**
     * The base folder
     *
     * @var string
     */
    protected $baseFolder = 'modules';

    /**
     * The base namespace
     *
     * @var string
     */
    protected $baseNamespace = 'Modules';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name} {--namespace=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * Create a new module
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        Storage::extend('local', function($app, $config) {
            $client = new Local(base_path());

            return new Filesystem($client);
        });
    }

    /**
     * The stub files and save path
     *
     * @return array
     */
    protected function files()
    {
        $stubPath = dirname(dirname(__DIR__)).'/stubs';

        return [
            $stubPath.'/publicIndex.stub'                    => 'public/'.$this->moduleName.'.php',
            $stubPath.'/Console/Kernel.stub'                 => $this->baseFolder.'/'.$this->moduleNamespace.'/Console/Kernel.php',
            $stubPath.'/Controllers/Controller.stub'         => $this->baseFolder.'/'.$this->moduleNamespace.'/Controllers/Controller.php',
            $stubPath.'/Exceptions/Handler.stub'             => $this->baseFolder.'/'.$this->moduleNamespace.'/Exceptions/Kernel.php',
            $stubPath.'/Http/Kernel.stub'                    => $this->baseFolder.'/'.$this->moduleNamespace.'/Http/Kernel.php',
            $stubPath.'/Http/routes.stub'                    => $this->baseFolder.'/'.$this->moduleNamespace.'/Http/routes.php',
            $stubPath.'/Providers/RouteServiceProvider.stub' => $this->baseFolder.'/'.$this->moduleNamespace.'/Providers/RouteServiceProvider.php',
        ];
    }

    /**
     * Transform string into a single namespace
     *
     * @param  string $str
     * @return string
     */
    protected function toNamespace($str)
    {
        return ucfirst(camel_case($str));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->moduleName      = $this->argument('name');
        $this->moduleNamespace = $this->toNamespace($this->moduleName);

        foreach ($this->files() as $stub => $savePath) {

            $content = strtr(file_get_contents($stub), [
                '{namespace}' => $this->moduleNamespace,
                '{baseNamespace}' => $this->baseNamespace,
            ]);

            Storage::disk('local')->put($savePath, $content);
        }

        $this->line("Module {$this->moduleName} has been generated.");
        $this->line("  Add this to your config/app.php@providers");
        $this->info("  {$this->baseNamespace}\\{$this->moduleNamespace}\\Providers\\RouteServiceProvider::class");
    }
}
