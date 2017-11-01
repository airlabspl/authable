<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
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
        $this->routes();
        $this->config();
        $this->permissions();
    }

    protected function database()
    {
        if (!$this->app->environment(['testing'])) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }

    protected function routes()
    {
        if ($this->app->environment('testing')) {
            Route::get('air/auth/test', function () {
                return 'Access';
            })->middleware('can:air-test');
        }
    }

    protected function config()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/authable.php', 'authable');

        $this->publishes([
            __DIR__.'/../config/authable.php' => config_path('authable.php')
        ], 'config');
    }

    protected function permissions()
    {
        if (auth()->check() && $user = auth()->user()) {
            $permissions = $user->role->permissions;

            foreach ($permissions as $permission) {
                Gate::define($permission->key, function () {
                    return true;
                });
            }
        }
    }
}
