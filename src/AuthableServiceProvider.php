<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class AuthableServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if (! $this->app->environment([ 'testing' ])) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
}
