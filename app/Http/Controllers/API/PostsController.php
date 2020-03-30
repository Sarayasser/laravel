<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Str;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserCollection;

// use App\Http\Resources\UserResource;

class PostsController extends Controller
{
    public function index(){
    	return new UserCollection(Post::paginate());
    }

    public function eager(){
        $posts = Post::with('user')->get();
        return $posts;
    }
    public function show(){
        $posts=Post::where('id',request()->post)->first();
    	return new PostResource($posts);
    }
    public function create(){
    	$request=request();
    	$post=new Post();
    	$post->title=$request->title;
    	$slug= Str::slug($request->title, '-');
    	$post->description=$request->description;
    	$post->slug=$slug;
    	$id=User::where('email',$request->email)->first();
    	$post->user_id=$id->id;

    	return $post->save();
    }
}
