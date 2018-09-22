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
    return view('welcome');
});

//Estudiantes
Route::get('/estudiantes','EstudiantesController@index');
Route::get('/estudiantes/create','EstudiantesController@create');
Route::post('/estudiantes', 'EstudiantesController@store');
Route::get('/estudiantes/{estudiante}','EstudiantesController@show');
Route::get('/estudiantes/{estudiante}/edit', 'EstudiantesController@edit');
Route::delete('/estudiantes/{estudiante}','EstudiantesController@destroy');
Route::patch('/estudiantes/{estudiantes}','EstudiantesController@update');

//Vehículos
Route::get('/vehiculos','VehiculosController@index');
Route::get('/vehiculos/create','VehiculosController@create');
Route::post('/vehiculos','VehiculosController@store');
Route::get('/vehiculos/{vehiculo}/edit','VehiculosController@edit');
Route::delete('/vehiculos/{vehiculo}','VehiculosController@destroy');
Route::patch('vehiculos/{vehiculo}','VehiculosController@update');

//Escuela 
Route::get('/escuelas','EscuelasController@index');

//Solver Rutas
//Route::get('/rutas','RutasController@index');
Route::get('/rutas/create','RutasController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
