<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Utility;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
        $this->middleware('ApiAuth:api',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $posts =$this->postService->gatAllPosts();
        return   Utility::ToApi("add restaurant",true,$posts,"OK",200);
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
            'file_id' =>['required']
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }

        $data=$request->only('file_id','name','from','to' ,'sunday', 'monday', 'tuesday','wednesday','thursday','friday', 'saturday');
        $resturant=Auth()->user()->Restaurant()->first();
        if($resturant == null )
        throw new CustomException("you are not restaurant");
        $data['restaurant_id']=$resturant->id;

        $post=$this->postService->add($data);
      return  Utility::ToApi("post is  added",true,$post,"OK",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
