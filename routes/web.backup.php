<?php

use Illuminate\Support\Facades\Route;
use App\Restaurant;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('f', function (Faker $faker) {
    

    for ($i=0; $i <1000 ; $i++) { 
        $rest =  Restaurant::create( [
  
            'user_id' => factory('App\User')->create()->id,
            'name' => $faker->name,
            "city"=>"Damscucs",
            "address"=>"mazah",
            "street" =>" fayaz ",
        ]);
        $category = factory('App\Category')->create(["name"=>"ice cream","restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
    
        $category = factory('App\Category')->create(["name"=>"pizza","restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
    
        $category = factory('App\Category')->create(["name"=>"burgar","restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 2,"file_id"=>6,"restaurant_id"=>$rest->id])->id;
        $product = factory('App\Product')->create(["name"=> $faker->name,'category_id'=>$category,"type_id"=> 1,"file_id"=>7,"restaurant_id"=>$rest->id])->id;
    }
    

});
