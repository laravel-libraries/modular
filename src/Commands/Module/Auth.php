<?php

namespace LaraLibs\Modular\Commands\Module;

use Illuminate\Auth\Console\MakeAuthCommand;
use LaraLibs\Modular\Commands\NamespaceConverterTrait;

class Auth extends MakeAuthCommand
{
    use NamespaceConverterTrait;

    /**
     * {@inheritdoc}
     */
    protected $signature = 'module:auth {name : Module Name} {--views : Only scaffold the authentication views}';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Scaffold basic login and registration views and routes on your modules';

    /**
     * {@inheritdoc}
     */
    protected $views = [
        'auth/login.stub' => 'vendor/modular/auth/login.blade.php',
        'auth/register.stub' => 'vendor/modular/auth/register.blade.php',
        'auth/passwords/email.stub' => 'vendor/modular/auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'vendor/modular/auth/passwords/reset.blade.php',
        'auth/emails/password.stub' => 'vendor/modular/auth/emails/password.blade.php',
        'layouts/app.stub' => 'vendor/modular/layouts/app.blade.php',
        'home.stub' => 'vendor/modular/home.blade.php',
        'welcome.stub' => 'vendor/modular/welcome.blade.php',
    ];


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $module = $this->argument('name');

        $this->createDirectories();

        $this->exportViews();

        if (! $this->option('views')) {
            $this->info('Installed HomeController.');

            file_put_contents(
                base_path('modules/'.$this->toNamespace($module).'/Http/Controllers/HomeController.php'),
                $this->compileControllerStub()
            );

            $this->info('Updated Routes File.');

            file_put_contents(
                base_path('modules/'.$this->toNamespace($module).'/Http/routes.php'),
                file_get_contents(__DIR__.'/stubs/routes.stub'),
                FILE_APPEND
            );
        }

        $this->comment('Authentication scaffolding generated successfully!');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories()
    {
        if (! is_dir(base_path('resources/views/layouts'))) {
            mkdir(base_path('resources/views/vendor/modular/layouts'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/vendor/modular/auth/passwords'))) {
            mkdir(base_path('resources/views/vendor/modular/auth/passwords'), 0755, true);
        }

        if (! is_dir(base_path('resources/views/vendor/modular/auth/emails'))) {
            mkdir(base_path('resources/views/vendor/modular/auth/emails'), 0755, true);
        }
    }

    /**
     * Override the existing getAppNamespace
     *
     * @return string
     */
    public function getAppNamespace()
    {
        return $this->toNamespace('modules/'.$this->argument('name')).'\\';
    }
}
