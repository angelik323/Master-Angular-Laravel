<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NoticiaController;

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
//Auth::routes();

Route::group(['middleware' => ['cors']], function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('noticias', NoticiaController::class);
});

// Route::get('/categorias', [CategoriaController::class, 'index']);
//Route::resource('clientes', 'ClienteController');
// Route::resource('clientes', ClienteController::class, ['except' => ['create', 'edit']]);
// Route::resource('categorias', 'CategoriaController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
