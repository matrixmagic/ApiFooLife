<?php

namespace App\Http\Services;
use App\Restaurant;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
class RestaurantService {


public function add($data,$services,$payments,$currencies,$games){

$validator =Validator::make($data,[
'name'=>'required','string',   
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
$resturant=Restaurant::find($resturant->id);
if($services!=null){
$services=$resturant->Services()->create($services);
$resturant->load('Services');
}
if($payments!=null){
    foreach ($payments as $item) {
        $resturant->Payments()->attach($item);
    }
    $resturant->load('Payments');
}
if($currencies!=null){
    foreach ($currencies as $item) {
        $resturant->Currencies()->attach($item);
    }
    $resturant->load('Currencies');
}

if($games!=null){
    foreach ($games as $item) {
        $resturant->Games()->attach($item);
    }
    $resturant->load('Games');
}




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
        if( $resturant ==null)
        throw new CustomException("Resturant not found");
        return $resturant;
    }
}
