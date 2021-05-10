<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturant=Auth()->user()->Restaurant()->first();

       
        if($resturant ==null)
        throw new CustomException("Resturant not found");
        $products = Product::where('restaurant_id',$resturant->id)->orderBy('displayOrder')->get();
        $products->load('Category');
        $products->load('File');
        $page_title = 'Product';
        $page_description = 'Here is your products list data';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = "products";
        return view('product.index', compact('page_title', 'page_description','action','logo','logoText','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Product';
        $page_description = 'create new product';
		
		$action = "product_create";
        $resturant=Auth()->user()->Restaurant()->first();
        if($resturant ==null)
        throw new CustomException("Resturant not found");
        $categories = Category::where('restaurant_id',$resturant->id)->where('parentCategory_id',null)->orderBy('displayOrder')->get();

        return view('product.create', compact('page_title', 'page_description','action','categories'));
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
            'file_id' =>['required'],
            'type_id' =>['required'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('category_id','file_id','name','price','details','type_id');

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
          return Redirect::to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id)->first();
        $product->delete();
        return Redirect::to('products');
    }



 
}
