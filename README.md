# TavoNiievez Larabot

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_name/:package_name.svg?style=flat-square)](https://packagist.org/packages/:vendor_name/:package_name)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/:vendor_name/:package_name/run-tests?label=tests)](https://github.com/:vendor_name/:package_name/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_name/:package_name.svg?style=flat-square)](https://packagist.org/packages/:vendor_name/:package_name)

## Installation

You can install the package via composer:

```bash
composer require tavoniievez/larabot
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Larabot\LarabotServiceProvider"
```

## Configuration

```dotenv
#.env
GOOGLE_CLOUD_PROJECT=project-id
GOOGLE_APPLICATION_CREDENTIALS="/full-path-to-credentials.json"
```

```php
# app/Http/Middleware/VerifyCsrfToken.php
protected $except = [
    'botman',
];
```

```php
# app/Providers/RouteServiceProvider.php
Route::namespace($this->namespace)
    ->group(base_path('routes/botman.php'));
```

```php
#config/app.php 
'providers' => [

    //Botman Driver
    Larabot\Providers\DriverServiceProvider::class,
],
```

## Commands

```shell script
      php artisan botman:cache:clear
      php artisan botman:install-driver
      php artisan botman:list-drivers
      php artisan botman:make:conversation
      php artisan botman:make:middleware
      php artisan botman:make:test
      php artisan botman:tinker
```

## Testing

``` bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
