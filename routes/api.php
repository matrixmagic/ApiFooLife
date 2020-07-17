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
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('IsEmailExists', 'AuthController@IsEmailExists');
    Route::post('checkToken', 'AuthController@CheckToken');
    
    

});

///////////////////////////////////////////////
Route::resource('file','FileController');
///////////////////////////////////////////////
Route::resource('restaurant', 'RestaurantController');
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
Route::post('changeDisplayOrder', "CategoryController@changeDisplayOrder");
Route::post('categoryEdit', "CategoryController@update");
Route::post('categoryDelete', "CategoryController@destroy");

///////////////////////////////////////////
