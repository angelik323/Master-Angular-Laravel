<?php

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

//Rutas de prueba

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-orm', 'PruebasController@testOrm');

//RUTAS DEL API

    //Métodos HTTP comunes
     /*GET: Conseguir datos o recursos
       POST: Guardar datos o recursos o hacer lógica (ó hacer lógica desde un formulario)
       PUT: Actualizar datos o recursos
       DELETE: Eliminar datos o recursos
       */

    //Rutas de prueba
    Route::get('/usuario/pruebas', 'UserController@pruebas');
    Route::get('/categoria/pruebas', 'CategoryController@pruebas');
    Route::get('/entrada/pruebas', 'PostController@pruebas');

    //Rutas del controlador de usuarios
    Route::post('/api/register', 'UserController@register');
    Route::post('/api/login', 'UserController@login');

