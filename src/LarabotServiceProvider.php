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
            __DIR__ . '/../resources/views' => base_path('resources/views'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/sass' => base_path('resources/sass'),
        ], 'sass');

        $this->publishes([
            __DIR__ . '/../resources/js' => base_path('resources/js'),
        ], 'js');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'larabot');

        $this->loadRoutesFrom(__DIR__ . '/../routes/botman.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/larabot.php', 'larabot');
    }
}
