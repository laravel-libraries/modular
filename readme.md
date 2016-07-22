![alt tag](https://raw.githubusercontent.com/laravel-libraries/modular/master/welcome.png)

---

### Build Status

| master branch                                                                                                                          | develop branch                                                                                                                          |
|----------------------------------------------------------------------------------------------------------------------------------------| ----------------------------------------------------------------------------------------------------------------------------------------|
| [![Build Status](https://travis-ci.org/laravel-libraries/modular.svg?branch=master)](https://travis-ci.org/laravel-libraries/modular)  | [![Build Status](https://travis-ci.org/laravel-libraries/modular.svg?branch=develop)](https://travis-ci.org/laravel-libraries/modular)  |

---

### Todo's

| Status                                      | Commands                                          | Descriptions                                                             |  
| ------------------------------------------- | ------------------------------------------------- | ------------------------------------------------------------------------ |  
| :thumbsup:                                  | make:module {name}                                | Create a new module                                                      |  |  
| :thumbsup:                                  | module:auth {module_name} {name}                  | Scaffold basic login and registration views and routes on your modules   |  
| :hourglass:                                 | module:console {module_name} {name}               | Create a new module's Artisan command                                    |  
| :hourglass:                                 | module:controller {module_name} {name}            | Create a new module's controller class                                   |  
| :hourglass:                                 | module:event {module_name} {name}                 | Create a new module's event class                                        |  
| :hourglass:                                 | module:job {module_name} {name}                   | Create a new module's job class                                          |  
| :hourglass:                                 | module:middleware {module_name} {name}            | Create a new module's middleware class                                   |  
| :hourglass:                                 | module:model {module_name} {name}                 | Create a new module's Eloquent model class                               |  
| :hourglass:                                 | module:provider {module_name} {name}              | Create a new module's service provider class                             |  

---

Now managing your applications to have the same resources is made easy with this package.

Imagine having an **API**, **Admin Panel** and some other functionalities that handles the same classes like ``service providers``, ``models``, ``events``, ``console commands``, ``migrations`` etc.

## Installation

via console, execute this ``composer require laralibs/modular@0.*@dev``

in your laravel project add this in your ``composer.json``

```json
{
    ...

    "autoload": {
        ...
        "psr-4": {
            ...
            "Modules\\": "modules"
        }
    },
    "minimum-stability": "dev",
    "prefer-stable": true
}
```

and add this **ModularServiceProvider** in your ``config/app.php`` at **providers** index.

```php
'providers' => [
    ...

    LaraLibs\Modular\ModularServiceProvider::class,
],
```

When you are done adding this class, you should be able to see ``make:module`` command after running the ``php artisan``

## Execution

When running the command

``php artisan make:module admin``, this should generate the lists of files

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
- [Napoleon Carino](https://github.com/napoleon101392)
