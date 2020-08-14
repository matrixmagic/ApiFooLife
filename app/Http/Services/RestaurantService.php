<?php

namespace App\Http\Services;
use App\Restaurant;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
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


    public function gatAllResturant(){
   $restaurants  = Restaurant::all();

   if( $restaurants ==null)
        throw new CustomException("Resturant not found");
    if(count($restaurants) ==0)
        throw new CustomException("no restaurants found");

   $restaurants->load('File')->first();
   $restaurants->load('Categories.Products')->where('parentCategory_id',null);
   $restaurants->load('Products');
   $restaurants->load('Services');
   $restaurants->load('Payments');
   $restaurants->load('Games');
   $restaurants->load('User');
   return $restaurants;
   
    }

    public function getAllProductInCatgory($restaurant_id,$category_id){
        $products=Product::where('restaurant_id',$restaurant_id)->where('category_id',$category_id)->get();
       
        if( $products ==null)
             throw new CustomException("products not found");
         if(count($products) ==0)
             throw new CustomException("no restaurants found");
        $products->load('File');
        $products->load('Category');
        $products->load('ProductExtra');
        
        return $products;
        
         }


         public function getResturantStatistic($chart_id,$date,$time){
            $resturant=Auth()->user()->Restaurant;

          
            if( $resturant ==null)
            throw new CustomException("Resturant not found");
            if($chart_id==1){

               $statistic =$resturant->Likes()->where('date','>=',$date)->orderBy('date')->groupBy('date')
                ->selectRaw('count(*) as total, date')
                ->get();

                dd($likeStatistic);
            }else if($chart_id==2){

                $statistic =$resturant->Favourites()->where('date','>=',$date)->orderBy('date')->groupBy('date')
                ->selectRaw('count(*) as total, date')
                ->get();

              

            }else if($chart_id==3){


            }

            if($statistic ==null || count($statistic)<=0){
                throw new CustomException("statistic not found");
            }
            $collection = collect([]);
            if($time==1){
                //days
                $Date=$date;
                $j=0;
                
                $Date = Carbon::createFromFormat('Y-m-d', $Date);
               
                for (; $Date->format('Y-m-d') <= date("Y-m-d") && $j< count($statistic); $Date->addDays(1)) { 
                   
                    if($statistic[$j]->date == $Date->format('Y-m-d')){
                        $item = new \stdClass();
                        $item->date= $Date->format('Y-m-d');
                        $item->count= $statistic[$j]->total;
           
                   $collection->push($item);
                 $j++;   
                }else{
                    $item = new \stdClass();
                    $item->date= $Date->format('Y-m-d');
                    $item->count=0;
                    $collection->push($item);
                }
                }
                
               
            


           
        }


        else if($time==2){
            //month
           
            $map=[];
        
      foreach ($statistic as $item) {

        $date2 = Carbon::createFromFormat('Y-m-d', $item->date);

        
    

if( Arr::exists($map, $date2->year."-".($date2->month<=9?"0".$date2->month:$date2->month)."-01"))
        $map[$date2->year."-".($date2->month<=9?"0".$date2->month:$date2->month)."-01"]+=$item->total;
 else{

    $map[$date2->year."-".($date2->month<=9?"0".$date2->month:$date2->month)."-01"]=1;

 }


      }
     
      $Date = Carbon::createFromFormat('Y-m-d', $date);
      $Date = Carbon::createFromFormat('Y-m-d', $Date->year."-".$Date->month."-"."01");
      $collection = collect([]);
      

     for (; $Date <=Carbon::createFromFormat('Y-m-d', date("Y-m-d") ); $Date->addMonth(1)) { 
      
        $item = new \stdClass();
        $item->date= $Date->format('Y-m-d');
        if( Arr::exists($map, $Date->format('Y-m-d'))){
       
        $item->count=$map[$Date->format('Y-m-d')];

    }
 else{

    $item->count=0;
       

            
 }
           
 $collection->push(    $item);


       
    }
    

    
    }

    else if($time==3){
        //year
       
        $map=[];
    
  foreach ($statistic as $item) {

    $date2 = Carbon::createFromFormat('Y-m-d', $item->date);

    


if( Arr::exists($map, $date2->year."-01-01"))
    $map[ $date2->year."-01-01"]+=$item->total;
else{

    $map[ $date2->year."-01-01"]=1;

}


  }
 
  $Date = Carbon::createFromFormat('Y-m-d', $date);
  $Date = Carbon::createFromFormat('Y-m-d', $Date->year."-01-01");
  $collection = collect([]);
  

 for (; $Date <=Carbon::createFromFormat('Y-m-d', date("Y-m-d") ); $Date->addYear(1)) { 
  
    $item = new \stdClass();
    $item->date= $Date->format('Y-m-d');
    if( Arr::exists($map, $Date->format('Y-m-d'))){
   
    $item->count=$map[$Date->format('Y-m-d')];

}
else{

$item->count=0;
   

        
}
       
$collection->push(    $item);


   
}



}

    
   if(count($collection)<=0)
   throw new CustomException("statistic not found");
         
    return $collection; 
}

}