<?php

namespace App\Http\Services;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class ProductService {


public function add($data){


if( Arr::exists($data, 'category_id'))
$category_id=$data['category_id'];
else
$category_id=null;
$resturant=Auth()->user()->Restaurant()->first();

$products=$resturant->Products()->get();
if(count( $products)==0){
$displayOrder=1;
}
else{
$brothersProducts=$products->where("category_id",$category_id);
if($brothersProducts==null)
$displayOrder=1;
else
$displayOrder =$brothersProducts->max('displayOrder')+1;
}
$data['displayOrder']=$displayOrder;
$data['category_id']=$category_id;
$product =$resturant->Products()->create($data);
$product->save();
return $product;
}

public function edit($data,$id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $product=Product::find($id);
        if($product==null)
        throw new CustomException("product not found");
        if($product->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this product");
    $product->name=$data['name'];
    $product->save();
    return $product;
    }

    public function changePrice($id,$price){
        $resturant=Auth()->user()->Restaurant()->first();
            $resturantId=$resturant->id;
           
            $product=Product::find($id);
            if($product==null)
            throw new CustomException("product not found");
            if($product->restaurant_id !=$resturantId)
            throw new CustomException("you don't have access on this product");
        $product->price=$price;
        $product->save();
        return $product;
        }


        public function changeContent($id,$content){
            $resturant=Auth()->user()->Restaurant()->first();
                $resturantId=$resturant->id;
               
                $product=Product::find($id);
                if($product==null)
                throw new CustomException("product not found");
                if($product->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this product");
            $product->content=$content;
            $product->save();
            return $product;
            }

        public function changePriceِForAllporducts($statement){

            try{
            $resturant=Auth()->user()->Restaurant()->first();
                $resturantId=$resturant->id;
               
                $products=Product::where('restaurant_id',$resturantId)->where("price","!=",null)->get();
                if($products==null)
                throw new CustomException("product not found");
                $addValue = (double)  Str::substr($statement, 1);
                            
                $addValue  = Str::substr($statement, 0,1)=='+'?$addValue:-$addValue;
                foreach ($products as  $item) {


                   $item->price=$item->price + $addValue; 
                   $item->save();
                }
          
            } catch (Throwable $th) {
                return   Utility::ToApi("exception ".$th,false, null,"badrequest",400);
            }
            return $products;
            }

    

            public function changePriceِForAllporductCateegory($category_id,$statement){

                try{
                $resturant=Auth()->user()->Restaurant()->first();
                    $resturantId=$resturant->id;
                    $category = Category::find($category_id);

                    
                    if($category==null)
                    throw new CustomException("category not found");

                    if($category->restaurant_id !=$resturantId)
                    throw new CustomException("you don't have access on this category");


                    $products=$category->Products()->where("price","!=",null)->get();
                    $addValue = (double)  Str::substr($statement, 1);
                                
                    $addValue  = Str::substr($statement, 0,1)=='+'?$addValue:-$addValue;
                    foreach ($products as  $item) {
    
    
                       $item->price=$item->price + $addValue; 
                       $item->save();
                    }
              
                } catch (Throwable $th) {
                    return   Utility::ToApi("exception ".$th,false, null,"badrequest",400);
                }
                return $products;
                }
    

    public function changeHidden($id){
        $resturant=Auth()->user()->Restaurant()->first();
            $resturantId=$resturant->id;
           
            $product=Product::find($id);
            if($product==null)
            throw new CustomException("product not found");
            if($product->restaurant_id !=$resturantId)
            throw new CustomException("you don't have access on this product");
        $product->hidden=!$product->hidden;
        $product->save();
        return $product;
        }

    

public function delete($id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $product=Product::find($id);
        if($product==null)
        throw new CustomException("product not found");
        if($product->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this product");
        $products=$resturant->Products;
        $product->delete();
        return $product;
   
    }

            public function changeDisplayOrder($id1,$id2){
                $resturant=Auth()->user()->Restaurant()->first();
                $resturantId=$resturant->id;
               
                $currentItem=Product::find($id1);
                if($currentItem==null)
                throw new CustomException("product not found");
                if($currentItem->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this product");
    
                $switchItem=Product::find($id2);
                if($switchItem==null)
                throw new CustomException("product not found");
                if($switchItem->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this product");
                
                $scale= $currentItem->displayOrder<$switchItem->displayOrder?-1:1;
                $collection = collect([$currentItem->displayOrder, $switchItem->displayOrder]);
                $tamp=$currentItem->displayOrder;
                $currentItem->displayOrder=$switchItem->displayOrder;
                
                $min=$collection->min();
                $max=$collection->max();

               $haveToChange= Product::where("restaurant_id",$currentItem->restaurant_id)->where('displayOrder', '>=', $min)
                ->where('displayOrder', '<=', $max)->get();
                //$haveToChange->update(['displayOrder' => $displayOrder+$scale]);

                foreach ($haveToChange as $item) {
                    $item->displayOrder = $item->displayOrder+$scale;
                    $item->save();
                }
                $switchItem->displayOrder=$switchItem->displayOrder+$scale;
                $currentItem->save();
                $switchItem->save();
                return true;
               
            
                }
    
    

public function get($id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;

        $product=Product::find($id);
        if($product==null)
        throw new CustomException("product not found");
        if($product->restuarant_id !=$resturantId)
        throw new CustomException("you don't have access on this product");
    return $product;
    }

    public function getAllProductInSide($category_id , $hidden){
    
     $resturant=Auth()->user()->Restaurant()->first();
      $products=$resturant->Products();
        if($products == null)
        throw new CustomException(" no products found");
      
        if($hidden == null){
            $hidden = false; 
        }
       $brothersProducts =$products->where("category_id",$category_id)->where('hidden',$hidden)->orderBy('displayOrder')->get();
       if(count( $brothersProducts)==0)
       throw new CustomException(" no products found");
    
       $brothersProducts->load('File')->first();

       foreach ($brothersProducts as $item) {
           $item->price=(double) $item->price;
       }
       return $brothersProducts;


    }
}
