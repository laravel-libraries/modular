<?php


use Illuminate\Support\Facades\Artisan;


class MakeModuleTest extends PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		Artisan::call('make:module', [
			'name' => 'naganna',
		]);
	}

	public function testConsoleKernelIfExist()
	{
		$consoleKernel = base_path('modules/naganna/Console/Kernel.php');

		$this->assertTrue(file_exists($consoleKernel));
	}

	public function testControllersControllerIfExist()
	{
		$controllersController = base_path('modules/naganna/Controllers/Controller.php');

		$this->assertTrue(file_exists($controllersController));
	}

	public function testExceptionsKernelIfExist()
	{
		$exceptionsKernel = base_path('modules/naganna/Exceptions/Kernel.php');

		$this->assertTrue(file_exists($exceptionsKernel));
	}

	public function testHttpKernelIfExist()
	{
		$httpKernel = base_path('modules/naganna/Http/Kernel.php');

		$this->assertTrue(file_exists($httpKernel));
	}

	public function testHttpRoutesIfExist()
	{
		$httpRoutes = base_path('modules/naganna/Http/routes.php');

		$this->assertTrue(file_exists($httpRoutes));
	}

	public function testProvidersRouteServiceProviderIfExist()
	{
		$providersRouteServiceProvider = base_path('modules/naganna/Providers/RouteServiceProvider.php');

		$this->assertTrue(file_exists($providersRouteServiceProvider));
	}

}
