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
})->name('index');

Route::get("/validar/codigo/{codigo}", "RegistroController@validar_codigo");
Route::get("/registro/resultados", "RegistroController@show");
Route::resource('/registro', 'RegistroController');

Route::post('/proyecto/actualizarTabla','ProyectoController@update');
Route::get('/proyecto-file/{file}',"ProyectoController@getProjectFile");
Route::resource('/proyecto', 'ProyectoController');

Route::post('/registrar_equipo', 'EquipoController@store');
Route::resource('/equipo' , 'EquipoController');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dash', 'HomeController@index')->name('dashboard');

    Route::get('/registros/listado', "RegistroController@listar_registros");
    Route::get('/registro_list',"RegistroController@index_admin")->name('registro_list');
    Route::get('/registros/obtener',"RegistroController@obtener_registros");
    Route::get('/registros/obtener/aprendices/{id}',"RegistroController@obtener_registros_aprendiz");
    Route::get('/registros/modificar/revision/{id}/{estado}',"RegistroController@modificar_estado_revision");
    Route::get('/registros/exportar/excel',"RegistroController@exportar_excel");
    Route::get('/registros/escarapela/{centro_id}',"RegistroController@generarPDF");
    Route::get('/archivos/{carpeta}/{archivo}',"RegistroController@obtener_documento");
    Route::get('/notificaciones', 'RegistroController@notificaciones');

    Route::get('/registros/generar/grupos', "RegistroController@generarGrupos");

    Route::get('/proyecto_list',"ProyectoController@index_admin")->name('proyecto_list');
    Route::get('/proyectos/obtener/registros',"ProyectoController@obtener_registros");
    
    Route::get('/equipo_list',"EquipoController@index_admin")->name('equipo_list');
    Route::get('/equipos/obtener',"EquipoController@obtener_registros_equipos_centros");
    Route::get('/equipo/obtener/{id}', 'EquipoController@obtener_equipos');
    Route::get('/equipos/generar/qr/{id_centro}',"EquipoController@generatePDF");

    Route::get('/fase',"FaseController@index")->name('fase_config');
    Route::get('/faseCarga',"FaseController@index_carga")->name('fase_carga');
    Route::get('/fase1',"FaseController@index_uno")->name('fase_uno');
    // Route::get('/fase3',"FaseController@index_tres")->name('fase_tres');
    // Route::get('/fase4',"FaseController@index_cuatro")->name('fase_cuarto');
});

