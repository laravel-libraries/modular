<?php

class MakeModuleTraitTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Artisan::call('make:module', [
            'name' => 'naganna',
        ]);
    }

    public function testConsoleKernelIfExist()
    {
        $path = base_path('modules/Naganna/Console/Kernel.php');
        $this->assertTrue(file_exists($path));
    }

    public function testControllersIfExist()
    {
        $path = base_path('modules/Naganna/Http/Controllers/Controller.php');
        $this->assertTrue(file_exists($path));
    }

    public function testExceptionsKernelIfExist()
    {
        $path = base_path('modules/Naganna/Exceptions/Kernel.php');
        $this->assertTrue(file_exists($path));
    }

    public function testHttpKernelIfExist()
    {
        $path = base_path('modules/Naganna/Http/Kernel.php');
        $this->assertTrue(file_exists($path));
    }

    public function testHttpRoutesIfExist()
    {
        $path = base_path('modules/Naganna/Http/routes.php');
        $this->assertTrue(file_exists($path));
    }

    public function testProvidersRouteServiceProviderIfExist()
    {
        $path = base_path('modules/Naganna/Providers/RouteServiceProvider.php');
        $this->assertTrue(file_exists($path));
    }
}
