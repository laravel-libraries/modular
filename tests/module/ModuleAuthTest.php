<?php

class ModuleAuthTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
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
