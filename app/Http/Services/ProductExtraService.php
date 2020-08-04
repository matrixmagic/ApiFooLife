<?php

namespace App\Http\Services;
use App\ProductExtra;
use App\Product;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class ProductExtraService {


public function add($data){


if(!Arr::exists($data, 'product_id'))
throw new CustomException("product_id not found");


$restaurant=Auth()->user()->Restaurant()->first();

$data['restaurant_id']=$restaurant->id;
$product=Product::find($data['product_id']);
if($product==null)
throw new CustomException("product not found");
if($product->restaurant_id !=$restaurant->id)
throw new CustomException("you don't have access on this product");

$productExtra =$product->ProductExtra()->create($data);
$productExtra->save();
return $productExtra;
}

public function edit($data,$id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $productExtra=ProductExtra::find($id);
        if($productExtra==null)
        throw new CustomException("product not found");
        if($productExtra->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this productExtra");
    $productExtra->name=$data['name'];
    $productExtra->notes=$data['notes'];
    $productExtra->price=$data['price'];
    $productExtra->save();
    return $productExtra;
    }

  
    public function changePrice($id,$price){
        $resturant=Auth()->user()->Restaurant()->first();
            $resturantId=$resturant->id;
           
            $productExtra=ProductExtra::find($id);
            if($productExtra==null)
            throw new CustomException("product not found");
            if($productExtra->restaurant_id !=$resturantId)
            throw new CustomException("you don't have access on this product");
        $productExtra->price=$price;
        $productExtra->save();
        return $productExtra;
        }

        public function changeContent($id,$name){
            $resturant=Auth()->user()->Restaurant()->first();
                $resturantId=$resturant->id;
        
                $productExtra=ProductExtra::find($id);
             
                if($productExtra==null)
                throw new CustomException("product not found");
                if($productExtra->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this product");
                $productExtra->name=$name;
                $productExtra->save();
            return $productExtra;
            }

    
    

public function delete($id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $productExtra=ProductExtra::find($id);
        if($productExtra==null)
        throw new CustomException("ProductExtra not found");
        if($productExtra->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this ProductExtra");

        $productExtra->delete();
        return $product;
   
    }

       
    

public function get($id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;

        $productExtra=ProductExtra::find($id);
        if($productExtra==null)
        throw new CustomException("product not found");
        if($productExtra->restuarant_id !=$resturantId)
        throw new CustomException("you don't have access on this product");
    return $productExtra;
    }

   
}
