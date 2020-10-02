<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Services\RestaurantService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class RestaurantController extends Controller
{



    protected $resturantService;

    /**
     * Create a new controller instance.
     *
     * @param  ResturantServcie  $users
     * @return void
     */
    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
        $this->middleware('ApiAuth:api',['except' => ['gatAllResturants','getAllProductInCatgory','getAllResturantPaging','getAllResturantPagingRand','getRestaurantById']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurant =$this->restaurantService->getUserRestaurant();
        
        return   Utility::ToApi("get all restaurant",true,$restaurant,"OK",200);
        //
    }

    public function getMyResturant()
    {

        $restaurant =$this->restaurantService->getMyResturant();
        
        return   Utility::ToApi("get my restaurant ",true,$restaurant,"OK",200);
        //
    }

    

    public function gatAllResturants()
    {

        $restaurant =$this->restaurantService->gatAllResturant();
        
        return   Utility::ToApi("get all restaurant",true,$restaurant,"OK",200);
        
    }

    public function getAllResturantPaging(Request $request)
    {

        $restaurant =$this->restaurantService->getAllResturantPaging($request->pageIndex,$request->pageSize);
        
        return   Utility::ToApi("get all restaurant",true,$restaurant,"OK",200);
        
    }

    public function getAllResturantPagingRand(Request $request)
    {

        $restaurant =$this->restaurantService->getAllResturantPagingRand($request->pageSize,$request->exceptRestaurantIds);
        
        return   Utility::ToApi("get all restaurant",true,$restaurant,"OK",200);
        
    }



    public function getAllProductInCatgory(Request $request)
    {
        $products =$this->restaurantService->getAllProductInCatgory($request->restaurant_id,$request->category_id);
        
        return   Utility::ToApi("get all products",true,$products,"OK",200);
        
    }


    public function getRestaurantById(Request $request)
    {
        $restaurant =$this->restaurantService->getRestaurantById($request->id);
        
        return   Utility::ToApi("get restaurant",true,$restaurant,"OK",200);
        
    }

    

    public function changeBackground(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file_id'=>['required'],
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        $restaurant =$this->restaurantService->changeBackground($request->file_id);
        
        return   Utility::ToApi("background is change",true,$restaurant,"OK",200);
        
    }

    
    public function changeLogo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'logo_id'=>['required'],
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        $restaurant =$this->restaurantService->changeLogo($request->logo_id);
        
        return   Utility::ToApi("logo is change",true,$restaurant,"OK",200);
        
    }





    
    

    public function getResturantStatistic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chart_id'=>['required'],
            'date'=>['required'],
            'time'=>['required']
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        $Statistic =$this->restaurantService->getResturantStatistic($request->chart_id,$request->date,$request->time);
        
        return   Utility::ToApi("get Statistic",true,$Statistic,"OK",200);
        
    }

    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $data =$request->only(['name','city','address','street','fax','openTime','closeTime']);
        if( Arr::exists($request->only(['services']), 'services'))
        $services=$request->only(['services'])['services'];
        else
        $services=null;
        if( Arr::exists($request->only(['payments']), 'payments'))
        $payments=$request->only('payments')['payments'];
        else
        $payments=null;

        if( Arr::exists($request->only(['currencies']), 'currencies'))
        $currencies=$request->only('currencies')['currencies'];
        else
        $currencies=null;
        if( Arr::exists($request->only(['games']), 'games'))
        $games=$request->only('games')['games'];
        else
        $games=null;
          
          
            $data['user_id'] = Auth::user()->id; 
            $restaurant =$this->restaurantService->add($data,$services,$payments,$currencies,$games);
        
        return   Utility::ToApi("add restaurant",true,$restaurant,"OK",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
