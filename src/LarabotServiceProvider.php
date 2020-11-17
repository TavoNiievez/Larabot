<?php

namespace Larabot;

use Illuminate\Support\ServiceProvider;

class LarabotServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/botman/config.php' => config_path('botman/config.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../config/botman/web.php' => config_path('botman/web.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../routes/botman.php' => config_path('routes/botman.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views'),
        ], 'views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/skeleton.php', 'skeleton');
    }
}
