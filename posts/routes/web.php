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
    $posts = DB::table('posts')
        ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
        //->where('posts.estatus',1)
        ->select('posts.*', 'categorias.nombre as categorianombre')
        ->get();
    return view('welcome',['posts' =>$posts]);
});

Route::get('/show/{id}', function ($id) {
    $post = DB::table('posts')
        ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
        ->where('posts.id',$id)
        ->select('posts.*', 'categorias.nombre as categorianombre')
        ->first();
    return view('show',['post' =>$post]);
});

Route::get('/{id}/edit', function ($id) {
    $post = DB::table('posts')
        ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
        ->where('posts.id',$id)
        ->select('posts.*', 'categorias.nombre as categorianombre')
        ->first();
    return view('show',['post' =>$post]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
