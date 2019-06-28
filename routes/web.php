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
Route::get("/registro/resultados", "RegistroController@show");
Route::resource('/registro', 'RegistroController');

Route::resource('/proyecto', 'ProyectoController');
/*
Route::get('/home', function () {
    return view('layouts.home');
});*/
Route::get('/proyecto_list',"ProyectoController@index_admin")->name('proyecto_list');
Route::post('/proyecto/actualizarTabla','ProyectoController@update');

Auth::routes();

Route::get('/dash', 'HomeController@index')->name('dashboard');
