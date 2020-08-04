<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Services\CategoryService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{



    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->middleware('ApiAuth:api',['except' => ['getRestrantCategory' ]] );
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

    
    public function getRestrantCategory(Request $request)
    {
    
        $categories=$this->categoryService->getRestrantCategory( $request->restaurant_id);
        return Utility::ToApi("get restaurant Categories",true,$categories,"OK",200);
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
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('name','parentCategory_id');

        $category=$this->categoryService->add( $data);
        return Utility::ToApi("category added",true,$category,"OK",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>['required', 'string'],
            'id' => ['required']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('name');

        $category=$this->categoryService->edit( $data,$request->id);
        return Utility::ToApi("update done",true,$category,"OK",200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
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
        $category=$this->categoryService->delete( $request->id);
        return Utility::ToApi("delete done",true,$category,"OK",200);
        
    }
    
    public function getAllCatetoriesAndProucts(Request $request)
    {

        $categories=$this->categoryService->getAllCatetoriesAndProucts();
        return Utility::ToApi("get all categories and products ",true,$categories ,"ok",200); 
    }

    public function getAllCatetoriesInSide(Request $request)
    {

        $categories=$this->categoryService->getAllCatetoriesInSide( $request->parentCategory_id);
        return Utility::ToApi("get all categorues ",true,$categories ,"ok",200); 
    }
    public function changeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>['required'],
            'up' =>['required'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }


        $result=$this->categoryService->changeOrder( $request->id,$request->up);
        if($result)
        return   Utility::ToApi("change order ",true,"change order successfuly" ,"ok",200);
  
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


        $result=$this->categoryService->changeDisplayOrder( $request->id1,$request->id2);
        if($result)
        return   Utility::ToApi("change order ",true,"change order successfuly" ,"ok",200);
  
    }

}
