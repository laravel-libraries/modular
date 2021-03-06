<?php

use Illuminate\Foundation\Application as APP;

class ModuleAuthTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if ((float) APP::VERSION <= (float) 5.1) {
            $this->markTestSkipped(
                'Auth is not available in Laravel 5.0'
            );
        }

        Artisan::call('make:module', [
            'name' => 'Acme',
        ]);

        Artisan::call('module:auth', [
            'name' => 'Acme',
        ]);
    }

    public function testScaffoldAuthExists()
    {
        $path = base_path('modules/Acme/Http/Controllers/HomeController.php');
        $this->assertTrue(file_exists($path));
    }
}
