<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind("App\Repositories\Product\ProductRepositoryInterface", "App\Repositories\Product\ProductRepository");
        $this->app->bind("App\Repositories\User\UserRepositoryInterface", "App\Repositories\User\UserRepository");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
