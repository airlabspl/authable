<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthableServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->database();

        if (auth()->check() && $user = auth()->user()) {

        }
    }

    protected function database()
    {
        if (!$this->app->environment(['testing'])) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}
