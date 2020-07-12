<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\RestaurantService;
use App\Http\Services\FileService;

class ServiceLayerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RestaurantService::class, function () {
        return new RestaurantService();
    });
        $this->app->bind(FileService::class, function () {
            return new FileService();
    });
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
