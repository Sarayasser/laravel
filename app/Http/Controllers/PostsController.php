<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index(){
    	$posts=Post::all();
    	return view('posts',['posts' => $posts]);
    }

    public function create(){
    	$users=User::all();	
    	return view('create',['users'=>$users]);
    }

    public function show(){
    	$request=request();
    	$slug=$request->slug;
    	$post=Post::where('slug',$slug)->first();
        $user=User::where('id',$post->user_id)->first();
    	return view('show',['post'=>$post],['user'=>$user]);
    }

    public function store(StorePostRequest $request){
        $slug= Str::slug($request->title, '-');
        Post::create([
    		'title'=>$request->title,
            'slug'=>$slug,
    		'description' => $request->description,
    		'user_id' => $request->id
    	]);
    	return redirect('/posts');	
    }

    public function delete(){
    	$request=request();
    	$id=$request->id;
    	Post::where('id',$id)->delete();
    	return redirect('/posts');
    }

    public function edit(){
    	$request=request();
    	$id=$request->postId;
    	$post=Post::where('id',$id)->first();
        $user=User::where('id',$post->user_id)->first();
    	return view('edit',['post'=>$post],['user'=>$user]);
    }

    public function update(StorePostRequest $request){
        $slug= Str::slug($request->title, '-');
    	$posts=Post::where('id',$request->post)->first()->update([
    		'title'=>$request->title,
            'slug'=>$slug,
    		'description' => $request->description,
    		'user_id' => $request->id
    	]);
    	return redirect('/posts');
    }
}
