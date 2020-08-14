<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        $this->middleware('ApiAuth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'name' =>['required', 'string'],
            'file_id' =>['required']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('category_id','file_id','name','price','details');

        $product=$this->productService->add($data);
      return  Utility::ToApi("product added",true,$product,"OK",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   $validator = Validator::make($request->all(), [
        'name' =>['required', 'string'],
        'id' => ['required']
    ]);
     
    if ($validator->fails()) {

        return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
       
    }

    $data=$request->only('name');

    $product=$this->productService->edit( $data,$request->id);
    return Utility::ToApi("update done",true,$product,"OK",200);


    }
    public function changeHidden(Request $request)
    {   $validator = Validator::make($request->all(), [
        'id' => ['required']
    ]);
     
    if ($validator->fails()) {

        return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
       
    }


    $product=$this->productService->changeHidden($request->id);
    return Utility::ToApi("hidden  change",true,$product,"OK",200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        $product=$this->productService->delete( $request->id);
        return Utility::ToApi("delete done",true,$product,"OK",200);
        
    }
    public function getAllProductsInSide(Request $request)
    {

        $products=$this->productService->getAllProductInSide( $request->category_id,$request->hidden);
        return Utility::ToApi("get all category ",true,$products ,"ok",200); 
    }
    
    public function changeDisplayOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id1' =>['required'],
            'id2' =>['required'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $result=$this->productService->changeDisplayOrder( $request->id1,$request->id2);
        if($result)
        return   Utility::ToApi("change order ",true,"change order successfuly" ,"ok",200);
  
    }


    public function changePrice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>['required'],
           
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $product=$this->productService->changePrice( $request->id,$request->price);
        return   Utility::ToApi("change price successful ",true,$product ,"ok",200);
  
    }


    public function changeContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>['required'],
            
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $products=$this->productService->changeContent( $request->id,$request->content);
        return   Utility::ToApi("change content successful ",true,$products ,"ok",200);
  
    }
    
    

    public function changePriceِForAllporductCateegory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'=>['required'],
            'statement' =>['required'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $products=$this->productService->changePriceِForAllporductCateegory($request->category_id ,$request->statement);
        return   Utility::ToApi("change price for all category products successful ",true,$products ,"ok",200);
  
    }


    

    public function productHappyTime(Request $request)
    {

  
        $validator = Validator::make($request->all(), [
            
            'amount' =>['required'],
            'from' =>['required'],
            'to'=>['required'],
            'sunday'=>['required'],
            'monday'=>['required'],
            'tuesday'=>['required'],
            'wednesday'=>['required'],
            'thursday'=>['required'],
            'friday'=>['required'],
            'saturday'=>['required'],
        ]);


     
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        
     
        $data=$request->only('category_id','from','to','amount','product_ids'
                            ,'sunday', 'monday', 'tuesday','wednesday','thursday','friday', 'saturday');

             

        $products=$this->productService->productHappyTime( $data);
        return   Utility::ToApi("chagnge products happyTime successful ",true,$products ,"ok",200);
  
    }
    

    public function changePriceِForAllporducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'statement' =>['required'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $product=$this->productService->changePriceِForAllporducts( $request->statement);
        return   Utility::ToApi("change price for all successful ",true,$product ,"ok",200);
  
    }


    

}
