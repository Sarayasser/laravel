<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'auth'],function(){
Route::get('/posts','PostsController@index')->name('posts.index');
Route::get('/posts/create','PostsController@create')->name('Post.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{slug}','PostsController@show')->name('posts.show');
Route::get('/delete/{id}','PostsController@delete')->name('posts.delete');
Route::get('/edit/{postId}','PostsController@edit')->name('posts.edit');
Route::post('/posts/{post}','PostsController@update')->name('posts.update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
