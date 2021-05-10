<?php

namespace App\Http\Services;
use App\Restaurant;
use App\Product;
use App\Customer;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
Use date;
class CustomerService {


public function add($data){
 



$customer =Auth()->user()->Customer;
if($customer !=null)
throw new CustomException("Customer is added to this user");


$customer =new Customer($data);
$customer->save();
$customer=Customer::find($customer->id);
return $customer;
}

public function get($id){
    $customer=Customer::find($id);
    if($customer ==null)
    throw new CustomException("customer not found");
    return $customer;
    }

    public function getUserCustomer(){
        $customer=Auth()->user()->Customer;
        if( $customer ==null)
        throw new CustomException("customer not found");
        return $customer;
    }

    public function like($productId){
        $product=Product::find($productId);
        if( $product ==null)
        throw new CustomException("product not found");
        $customer=Auth()->user()->Customer;
        if( $customer ==null)
        throw new CustomException("customer not found");
        $like =$customer->Likes()->where('product_id',$product->id)->first();
        if($like==null){
            
            $like=   $customer->Likes()->create(['product_id'=>$product->id,'restaurant_id'=>$product->restaurant_id,'date'=>date("Y/m/d")]);
            $like->like=1;
        }else{
            $like->delete();
            $like->like=0;
        }

        return $like;

    }
    public function favourite($Resturant_id){
        $restaurant=Restaurant::find($Resturant_id);
        if( $restaurant ==null)
        throw new CustomException("restaurant not found");
        $customer=Auth()->user()->Customer;
        if( $customer ==null)
        throw new CustomException("customer not found");
        $favourite =$customer->Favourites()->where('restaurant_id',$restaurant->id)->first();
        if($favourite==null){
            $favourite= $customer->Favourites()->create(['restaurant_id'=>$restaurant->id,'date'=>date("Y/m/d")]);
            $favourite->favourite=1;
        }else{
            $favourite->delete();
            $favourite->favourite=0;
        }

        return $favourite;

    }


 

   


         
}
