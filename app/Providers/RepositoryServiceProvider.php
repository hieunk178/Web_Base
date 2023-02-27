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
        $this->app->bind("App\Repositories\Brand\BrandRepositoryInterface", "App\Repositories\Brand\BrandRepository");
        $this->app->bind("App\Repositories\CategoryProduct\CategoryRepositoryInterface", "App\Repositories\CategoryProduct\CategoryRepository");
        $this->app->bind("App\Repositories\Slider\SliderRepository");
        $this->app->bind("App\Repositories\Cart\CartRepository");
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
