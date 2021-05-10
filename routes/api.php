<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('loginByDeviceIdAsGuest', 'AuthController@loginByDeviceIdAsGuest');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('IsEmailExists', 'AuthController@IsEmailExists');
    Route::post('checkToken', 'AuthController@CheckToken');
    Route::post('verifyRestaurant', 'AuthController@verifyRestaurant');
    Route::post('IsEmailVerify', 'AuthController@IsEmailVerify');
    Route::post('changeRestaurantPassword', 'AuthController@changeRestaurantPassword');
    
    
});

///////////////////////////////////////////////
Route::resource('file','FileController');
///////////////////////////////////////////////
Route::get('home','HomeController@home');
///////////////////////////////////////////////

Route::post('restaurantChangeBackground','RestaurantController@changeBackground');
Route::resource('restaurant', 'RestaurantController');
Route::get('gatAllResturants','RestaurantController@gatAllResturants');
Route::post('getAllResturantPaging','RestaurantController@getAllResturantPaging');
Route::post('getAllResturantPagingRand','RestaurantController@getAllResturantPagingRand');
Route::post('getAllProductInCatgory','RestaurantController@getAllProductInCatgory');
Route::post('getResturantStatistic','RestaurantController@getResturantStatistic');
Route::get('getMyResturant','RestaurantController@getMyResturant');
Route::post('getRestaurantById','RestaurantController@getRestaurantById');

Route::post('changeLogo','RestaurantController@changeLogo');


/////////////////////////////////////////
Route::resource('payment', 'PaymentController');
//////////////////////////////////////////
Route::resource('currency', 'CurrencyController');
//////////////////////////////////////////
Route::resource('game', 'GameController');
////////////////////////////////////////////////
Route::resource('category', 'CategoryController');
Route::post('getAllCatetoriesInSide', "CategoryController@getAllCatetoriesInSide");
Route::post('changeOrder', "CategoryController@changeOrder");
Route::post('changeCategoriesDisplayOrder', "CategoryController@changeDisplayOrder");
Route::post('categoryEdit', "CategoryController@update");
Route::post('categoryDelete', "CategoryController@destroy");
Route::post('getRestrantCategory', "CategoryController@getRestrantCategory");
Route::get('getAllCatetoriesAndProucts', "CategoryController@getAllCatetoriesAndProucts");
///////////////////////////////////////////
Route::resource('product', 'ProductController');
Route::post('getAllProductsInSide', "ProductController@getAllProductsInSide");
Route::post('productChangeHidden', "ProductController@changeHidden");
Route::post('changeproductsDisplayOrder', "ProductController@changeDisplayOrder");
Route::post('productEdit', "ProductController@update");
Route::post('productDelete', "ProductController@destroy");
Route::post('changePrice', "ProductController@changePrice");
Route::post('changePriceِForAllporducts', "ProductController@changePriceِForAllporducts");
Route::post('changeProductContent', "ProductController@changeContent");
Route::post('changePriceِForAllporductCateegory', "ProductController@changePriceِForAllporductCateegory");
Route::post('changePriceِForAllporductCateegory', "ProductController@changePriceِForAllporductCateegory");
Route::post('productHappyTime', "ProductController@productHappyTime");
Route::post('getAllFoodsPaging', "ProductController@getAllFoodsPaging");
Route::post('getAllDrinksPaging', "ProductController@getAllDrinksPaging");
Route::post('getAllDrinksPagingRand', "ProductController@getAllDrinksPagingRand");
Route::post('getAllFoodsPagingRand', "ProductController@getAllFoodsPagingRand");




////////////////////////////////////////////////////////

Route::resource('productExtra', 'ProductExtraController');
Route::post('productExtraEdit', "ProductExtraController@update");
Route::post('changeExtraPrice', "ProductExtraController@changePrice");
Route::post('productExtraDelete', "ProductExtraController@destroy");
Route::post('changeContentproductExtra', "ProductExtraController@changeContent");

///////////////////////////////////////////////////////////////////
Route::resource('customer', 'CustomerController');
Route::post('customerLike', "CustomerController@like");
Route::post('customerFavourite', "CustomerController@favourite");

//////////////////////////////////////////////////////////
Route::resource('post', 'PostController');

/////////////////////////////////////////////////////////////

Route::post('restaurantOrderByDistance', "SearchController@restaurantOrderByDistance");
Route::post('serachLocation', "SearchController@serachLocation");
Route::post('serachRestaurants', "SearchController@serachRestaurants");


