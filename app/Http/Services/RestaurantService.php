<?php

namespace App\Http\Services;
use App\Restaurant;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
class RestaurantService {


public function add($data){
$validator =Validator::make($data,[
'city'=>'required', 'string',
'address'=>'required', 'string',
'street' =>'required', 'string',
'user_id'=>'required','unique:restaurants'
]);
if($validator->fails())
throw new CustomException($validator->messages()->first());
$exists=Restaurant::where('user_id',$data['user_id'])->first();
if($exists !=null)
throw new CustomException("Restaurant is added to this user");
$resturant =new Restaurant($data);
$resturant->save();
return $resturant;
}

public function get($id){
    $resturant=Restaurant::find($id);
    if($resturant ==null)
    throw new CustomException("Resturant not found");
    return $resturant;
    }

    public function getUserRestaurant(){
        $resturant=Auth()->user()->Restaurant;
        if($resturant ==null)
        throw new CustomException("Resturant not found");
        return $resturant;
    }
}
