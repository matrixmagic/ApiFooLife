<?php

namespace App\Http\Services;
use App\Post;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
class PostService {


public function add($data){


$post =new Post($data);
$post->save();
$post=Post::find($post->id);

return $post;
}

public function get($id){
    $post=Post::find($id);
    if($post ==null)
    throw new CustomException("post not found");
    return $post;
    }

    public function getUserPost(){
        $resturant=Auth()->user()->Restaurant;
        if( $resturant ==null)
        throw new CustomException("Resturant not found");
        $posts=$resturant->Posts();
        if(count($posts)==0)
        throw new CustomException(" no post found");

        return $posts;
    }


    public function gatAllPosts(){
   $posts  = Post::orderBy('created_at')->get();

   if( $posts ==null)
        throw new CustomException("Post not found");
    if(count($posts) ==0)
        throw new CustomException("no Post found");

   $posts->load('Image');
   return $posts;
   
    }

    
}