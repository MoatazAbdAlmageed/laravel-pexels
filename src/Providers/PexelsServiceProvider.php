<?php

namespace Jpereira\Pexels\Providers;

use Illuminate\Support\ServiceProvider;
use Jpereira\Pexels\Pexels;


class PexelsServiceProvider extends ServiceProvider
{
    
    public function boot(): void
    {
        $this->bootPublishes();
    }


    public function register(): void
    {
        $this->registerConfig();
        $this->registerFacade();
    }

   
    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__.'/../config/pexels.php' => $this->app->configPath('pexels.php'),
        ], 'config');
    }

    
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pexels.php', 'pexels');
    }

    
    protected function registerFacade(): void
    {
        $this->app->singleton('pexels', function ($app) {
            return new Pexels();
        });
    }
    
}