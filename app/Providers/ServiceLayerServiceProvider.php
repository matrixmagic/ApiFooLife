<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\RestaurantService;
use App\Http\Services\FileService;
use App\Http\Services\PaymentService;
use App\Http\Services\CurrencyService;
use App\Http\Services\GameService;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Http\Services\ProductExtraService;
use App\Http\Services\CustomerService;
use App\http\Services\PostService;
use App\http\Services\SearchService;


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

    $this->app->bind(PaymentService::class, function () {
        return new PaymentService();
});
$this->app->bind(CurrencyService::class, function () {
    return new CurrencyService();
});
$this->app->bind(GameService::class, function () {
    return new GameService();
});
$this->app->bind(CategoryService::class, function () {
    return new CategoryService();
});
$this->app->bind(ProductService::class, function () {
    return new ProductService();
});

$this->app->bind(ProductExtraService::class, function () {
    return new ProductExtraService();
});
$this->app->bind(CustomerService::class, function () {
    return new CustomerService();
});
$this->app->bind(PostService::class, function () {
    return new PostService();
});
$this->app->bind(SearchService::class, function () {
    return new SearchService();
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
