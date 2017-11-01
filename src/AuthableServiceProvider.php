<?php

namespace Airlabs\Authable;

use Illuminate\Support\ServiceProvider;

class AuthableServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
