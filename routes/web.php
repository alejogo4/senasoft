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

Route::post('/proyecto/actualizarTabla','ProyectoController@update');
Route::get('/proyecto-file/{file}',"ProyectoController@getProjectFile");
Route::resource('/proyecto', 'ProyectoController');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dash', 'HomeController@index')->name('dashboard');

    Route::get('/proyecto_list',"ProyectoController@index_admin")->name('proyecto_list');

    Route::get('/registros/listado', "RegistroController@listar_registros");
});


