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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
