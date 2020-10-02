<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RestaurantService;
use App\Http\Services\ProductService;
use App\Http\Utility;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $home = new \stdClass();
        $resturantService = new RestaurantService();
        $home->restaurants = $resturantService->gatAllResturant();

        $productService = new ProductService();
        $home->products = $productService->getAllProduct();
        
        return   Utility::ToApi("home data return successfully",true,$home,"OK",200);
    }
}
