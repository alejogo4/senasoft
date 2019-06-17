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

Route::get('/', function () {
    return view('layouts.home');
});


Route::get("/validar/codigo/{codigo}", "RegistroController@validar_codigo");
Route::resource('/registro', 'RegistroController');

Route::resource('/proyecto', 'ProyectoController');
/*
Route::get('/home', function () {
    return view('layouts.home');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
