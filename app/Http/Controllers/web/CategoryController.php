<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Redirect;
class CategoryController extends Controller
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
        $categories = Category::where('restaurant_id',$resturant->id)->where('parentCategory_id',null)->orderBy('displayOrder')->get();
        
        $page_title = 'Category';
        $page_description = 'Here is your order list data';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = "categories";
        return view('dashboard.categories', compact('page_title', 'page_description','action','logo','logoText','categories'));
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
        $resturant=Auth()->user()->Restaurant()->first();

        $categories=$resturant->Categories()->get();
        if(count( $categories)==0){
        $displayOrder=1;
        }
        else{
        $brothersCats=$categories->where("parentCategory_id", $request['parentCategory_id']);
        if($brothersCats==null)
        $displayOrder=1;
        else
        $displayOrder =$brothersCats->max('displayOrder')+1;
        }
        $request['displayOrder']=$displayOrder;
        $category =$resturant->Categories()->create($request->all());
        $category->save();
          return Redirect::to('categories');
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
        //
    }
}
