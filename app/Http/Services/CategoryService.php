<?php

namespace App\Http\Services;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class CategoryService {


public function add($data){


if( Arr::exists($data, 'parentCategory_id'))
$parentCategory_id=$data['parentCategory_id'];
else
$parentCategory_id=null;
$resturant=Auth()->user()->Restaurant()->first();

$categories=$resturant->Categories()->get();
if(count( $categories)==0){
$displayOrder=1;
}
else{
$brothersCats=$categories->where("parentCategory_id",$parentCategory_id);
if($brothersCats==null)
$displayOrder=1;
else
$displayOrder =$brothersCats->max('displayOrder')+1;
}
$data['displayOrder']=$displayOrder;
$data['parentCategory_id']=$parentCategory_id;
$category =$resturant->Categories()->create($data);
$category->save();
return $category;
}

public function edit($data,$id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $category=Category::find($id);
        if($category==null)
        throw new CustomException("category not found");
        if($category->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this category");
    $category->name=$data['name'];
    $category->save();
    return $category;
    }

    

public function delete($id){
    $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $category=Category::find($id);
        if($category==null)
        throw new CustomException("category not found");
        if($category->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this category");
        $categories=$resturant->Categories;
        $category->delete();
        return $category;
   
    }

    public function changeOrder($id,$up){
        $resturant=Auth()->user()->Restaurant()->first();
        $resturantId=$resturant->id;
       
        $category=Category::find($id);
        if($category==null)
        throw new CustomException("category not found");
        if($category->restaurant_id !=$resturantId)
        throw new CustomException("you don't have access on this category");
        $parentCategory_id= $category->parentCategory_id;
        $brothersCats =$resturant->Categories()->where('parentCategory_id',$parentCategory_id)->orderBy('displayOrder')->get();
        $currentItem=  $brothersCats->find($id);
        if($up){
         $switchItem=$brothersCats->where('displayOrder','<',$currentItem->displayOrder)->last();
         if($switchItem==null)
         throw new CustomException("it's the first one");
        $tamp=$currentItem->displayOrder;
        $currentItem->displayOrder=$switchItem->displayOrder;
        $switchItem->displayOrder=$tamp;
        $currentItem->save();
        $switchItem->save();
        return true;
        }else{

         $switchItem=$brothersCats->where('displayOrder','>',$currentItem->displayOrder)->first();
         if($switchItem==null)
         throw new CustomException("it's the last one");
        $tamp=$currentItem->displayOrder;
        $currentItem->displayOrder=$switchItem->displayOrder;
        $switchItem->displayOrder=$tamp;
        $currentItem->save();
        $switchItem->save();

        return true;
        }
        return false;
        }


        public function changeDisplayOrder2($id1,$id2){
            $resturant=Auth()->user()->Restaurant()->first();
            $resturantId=$resturant->id;
           
            $currentItem=Category::find($id1);
            if($currentItem==null)
            throw new CustomException("category not found");
            if($currentItem->restaurant_id !=$resturantId)
            throw new CustomException("you don't have access on this category");

            $switchItem=Category::find($id2);
            if($switchItem==null)
            throw new CustomException("category not found");
            if($switchItem->restaurant_id !=$resturantId)
            throw new CustomException("you don't have access on this category");
            
         
            $tamp=$currentItem->displayOrder;
            $currentItem->displayOrder=$switchItem->displayOrder;
            $switchItem->displayOrder=$tamp;
            $currentItem->save();
            $switchItem->save();
            return true;
           
        
            }


            public function changeDisplayOrder($id1,$id2){
                $resturant=Auth()->user()->Restaurant()->first();
                $resturantId=$resturant->id;
               
                $currentItem=Category::find($id1);
                if($currentItem==null)
                throw new CustomException("category not found");
                if($currentItem->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this category");
    
                $switchItem=Category::find($id2);
                if($switchItem==null)
                throw new CustomException("category not found");
                if($switchItem->restaurant_id !=$resturantId)
                throw new CustomException("you don't have access on this category");
                
                $scale= $currentItem->displayOrder<$switchItem->displayOrder?-1:1;
                $collection = collect([$currentItem->displayOrder, $switchItem->displayOrder]);
                $tamp=$currentItem->displayOrder;
                $currentItem->displayOrder=$switchItem->displayOrder;
                
                $min=$collection->min();
                $max=$collection->max();

               $haveToChange= Category::where("restaurant_id",$currentItem->restaurant_id)->where('displayOrder', '>=', $min)
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

        $category=Catogry::find($id);
        if($category==null)
        throw new CustomException("category not found");
        if($category->restuarant_id !=$resturantId)
        throw new CustomException("you don't have access on this category");
    return $category;
    }

    public function getAllCatetoriesInSide($parentCategory_id){
      $resturant=Auth()->user()->Restaurant()->first();
      $categories=$resturant->Categories();
        if($categories ==null)
        throw new CustomException(" no Categories found");
       $brothersCats =$brothersCat=$categories->where("parentCategory_id",$parentCategory_id)->orderBy('displayOrder')->get();
       if(count( $brothersCats)==0)
       throw new CustomException(" no Categories found");
        return $brothersCats;
    }
    public function getAllCatetoriesAndProucts(){
        $resturant=Auth()->user()->Restaurant()->first();
        $categories=$resturant->Categories();
          if($categories ==null)
          throw new CustomException(" no Categories found");
         $brothersCats =$brothersCat=$categories->where("parentCategory_id",null)->orderBy('displayOrder')->get();
         if(count( $brothersCats)==0)

         throw new CustomException(" no Categories found");
         $brothersCats->load('Products.File','Products.ProductExtra');
          return $brothersCats;
      }
    public function getRestrantCategory($restaurant_id){
        $categories = Category::where('restaurant_id',$restaurant_id)->where('parentCategory_id',null)->get();
        $categories->load('Products');
        if( $categories ==null)
             throw new CustomException("Categories not found");
         if(count($categories) ==0)
             throw new CustomException("no Categories found");
            return $categories;
        
         }

         

}
