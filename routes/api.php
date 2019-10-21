<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'API\UserController@login');

Route::post('/grupos', 'API\RegistroController@grupos');
Route::get('/listar/grupos', "RegistroController@listarGrupos");

Route::get('proyectos', 'API\ProyectoController@seleccionarTopGanadores');

Route::get('/obtener/puntaje/{categoria_id}', 'API\RegistroController@puntaje');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/registrosRefrigerio', 'API\RefrigerioController@comprobarRefrigerio');

    Route::get('/equipaje/cantidad', 'API\EquipajeController@cantidad_equipaje_guardado');
    Route::post('/equipaje/ingreso', 'API\EquipajeController@ingreso_equipaje');
    Route::post('/equipaje/salida', 'API\EquipajeController@salida_equipaje');

    Route::get('/asignacion/hotel/{persona_id}', 'API\HotelController@index');
});
