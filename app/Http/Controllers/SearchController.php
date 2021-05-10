<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Services\SearchService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
        $this->middleware('ApiAuth:api',['except' => ['restaurantOrderByDistance' , 'serachRestaurants']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function restaurantOrderByDistance(Request $request)
    {
        $sortedRestaurants=$this->searchService-> restaurantOrderByDistance($request->longitude,$request->latitude);
      return  Utility::ToApi("get all resturants order by distance",true,$sortedRestaurants,"OK",200);
    }
   
    public function serachLocation(Request $request)
    {
        $sortedRestaurants=$this->searchService-> serachLocation($request->$searchValue,$request->$type,$request->$longitude ,$request->$latitude,$request->$maxDistance=40,$request->$locationType) ;
      return  Utility::ToApi("get all resturants order by distance",true,$sortedRestaurants,"OK",200);
    }
   

    public function serachRestaurants(Request $request)
    {
      $sortedRestaurants=$this->searchService->serachRestaurants($request->searchKey,$request->longitude,$request->latitude,$request->maxDistance);
      return  Utility::ToApi("get searched resturants by key order by distance",true,$sortedRestaurants,"OK",200);
    }

   
    

}
