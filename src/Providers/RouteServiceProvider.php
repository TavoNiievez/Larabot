<?php

declare(strict_types=1);

namespace Larabot\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->routes(function () {
            Route::namespace($this->namespace)
                ->group(base_path('routes/botman.php'));
        });
    }
}
