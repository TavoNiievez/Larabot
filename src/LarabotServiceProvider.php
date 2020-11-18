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
        ]);

        $this->publishes([
            __DIR__ . '/../config/botman/web.php' => config_path('botman/web.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/sass' => base_path('resources/sass'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/js' => base_path('resources/js'),
        ]);

        $this->publishes([
            __DIR__ . '/../routes' => base_path('routes'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'larabot');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/larabot.php', 'app');
    }
}
