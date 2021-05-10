<?php

namespace App\Http\Services;
use App\ProductExtra;
use App\Restaurant;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class SearchService {

public function restaurantOrderByDistance($longitude ,$latitude){

$resturants= Restaurant::all();
foreach ($resturants as $item) {
    $item->distance=$this->getDistance($latitude,$longitude,$item->latitude,$item->longitude);
}
return $sortedRestaurants=$resturants->sortBy('distance');

}

public function serachLocation($searchValue,$type,$longitude ,$latitude,$maxDistance=40,$locationType){

    if($type==1){
        //gps 
         
        $restaurants=new Restaurant();
        if($searchValue!=null &&$searchValue!="")  
            $restaurants    = $restaurants->where("name","like","%".$searchValue."%")->get();
       
           $restaurantsIds =Product::where("name","like","%".$searchValue."%")->select("restaurant_id")->get();
           $restaurants=$restaurants->merge(Restaurant::whereIn($restaurantsIds)->get());




           foreach ($restaurants as $item) {
            $item->distance=$this->getDistance($latitude,$longitude,$item->latitude,$item->longitude);
        }
      $resturants=  $resturants->where('distance',"<=",$maxDistance)->get();
      $sortedRestaurants=$resturants->sortBy('distance');
      return $sortedRestaurants;

    }else{
        
        if($locationType==1){

            $restaurants= Restaurant::where("city","like","%".$searchValue."%")->get();
            return $resturants;
        }

        else if($locationType==2){

            $restaurants= Restaurant::where("address","like","%".$searchValue."%")->get();
            return $resturants;
        }
        else if($locationType==3){

            $restaurants= Restaurant::where("street","like","%".$searchValue."%")->get();
            return $resturants;
        }



    }


    
    } 
    

    public function serachRestaurants($searchKey,$longitude ,$latitude,$maxDistance=4000)
    {
        if($searchKey ==null || $searchKey==""|| $searchKey==" "){

           
            $restaurantIds = Restaurant::all()->pluck('id');
            $products = Product::all();
            $products->load('File');
        }
        else{

        $products = Product::where('name','like','%'.$searchKey.'%')->get();
        $products->load('File');
        $restaurantIds = $products->pluck('restaurant_id');
        $restaurantIds = $restaurantIds->merge(Category::where('name','like','%'.$searchKey.'%')->get()->pluck('restaurant_id'));
        $restaurantIds = $restaurantIds->merge(Restaurant::where('name','like','%'.$searchKey.'%')->get()->pluck('id'));
        }
        //$restaurants = Restaurant::whereIn('id',$restaurantIds)->get();
        $restaurants  = User::where('role_id',2)->where('isVerfied',true)->with('Restaurant.File','Restaurant.Services','Restaurant.MainCategories','Restaurant.Products','Restaurant.PaymentsMethod','Restaurant.Games','Restaurant.User','Restaurant.Post.Image')->get()->pluck('Restaurant')->flatten()->whereIn('id',$restaurantIds);//->get();
        
            if($longitude !="-111111.0"){
        foreach ($restaurants as $item) {
            $item->distance=$this->getDistance($latitude,$longitude,$item->latitude,$item->longitude);
            $sortedRestaurants=$restaurants->sortBy('distance');
            return ["restaurants" =>$sortedRestaurants->values() , "products" => $products];
        }
        
        // $restaurants=  $restaurants->where('distance',"<=",$maxDistance);
        // return $maxDistance;
       
    }else{

        return ["restaurants" =>$restaurants, "products" => $products];
    }

       
    }



    
public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
    
    $earth_radius = 6371;

    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;
    
}


   
}
