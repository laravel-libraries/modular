# Modular Laravel

Now managing your applications to have the same resources is made easy with this package.

Imagine having an **API**, **Admin Panel**, any many more; that handles the same classes such as ``service providers``, ``models``, ``events``, ``console commands``, same ``migrations`` and etc.

## Installation

via composer ``composer require laralibs/modular@0.*@dev``

Add this service into your ``config/app.php`` at **providers** index.

```php
'providers' => [
    ...

    LaraLibs\Modular\ModularServiceProvider::class,
],
```

When you are than adding this class, you should be able to see ``make:module`` command when running ``php artisan``

## Execution

When running the command

``php artisan make:console admin``, this should generate the lists of files

- public/admin.php
- modules/Admin/Console/Kernel.php
- modules/Admin/Controllers/Controller.php
- modules/Admin/Exceptions/Handler.php
- modules/Admin/Http/Kernel.php
- modules/Admin/Http/routes.php
- modules/Admin/Providers/RouteServiceProvider.php

After that, insert the **RouteServiceProvider.php** in your providers config, something like ``Modules\Admin\Providers\RouteServiceProvider::class``

## Web Server

Now point your NginX or Apache to use the ``public/admin.php`` instead, and you are set to go!

## Contributors

- [Daison Carino](https://github.com/daison12006013)
