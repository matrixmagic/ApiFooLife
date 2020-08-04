<?php

namespace App\Http\Controllers;

use App\ProductExtra;
use Illuminate\Http\Request;
use App\Http\Services\ProductExtraService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ProductExtraController extends Controller
{
    protected $productExtraService;

    public function __construct(ProductExtraService $productExtraService)
    {
        $this->productExtraService = $productExtraService;
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
            'product_id' =>['required' ],
        ]);
    
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('product_id','name','notes','price');

        $productExtra=$this->productExtraService->add($data);
      return  Utility::ToApi("productExtra added",true,$productExtra,"OK",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function show(ProductExtra $productExtra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductExtra $productExtra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductExtra $productExtra)
    {
           $validator = Validator::make($request->all(), [
            'id' =>['required' ],
            'name' =>['required'],
            'notes' =>['required'],
            'price' =>['required'],
        ]);
         
        if ($validator->fails()) {
    
            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
    

        $data=$request->only('name','notes','price');
    
        $productExtra=$this->productExtraService->edit( $data,$request->id);
        return Utility::ToApi("update done",true,$productExtra,"OK",200);
    
    
    
}

public function changePrice(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id' =>['required'],
        'price' =>['required'],
    ]);
     
    if ($validator->fails()) {

        return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
       
    }

        $product=$this->productExtraService->changePrice( $request->id,$request->price);
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

        $product=$this->productExtraService->changeContent( $request->id,$request->content);
        return   Utility::ToApi("change price successful ",true,$product ,"ok",200);
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductExtra  $productExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductExtra $productExtra)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
        $productExtra=$this->productExtraService->delete( $request->id);
        return Utility::ToApi("delete done",true,$productExtra,"OK",200);
        

    }
}
