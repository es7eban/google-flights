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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::name('vuelos_formFind_path')->get('/','VueloController@formFind');
//Route::name('vuelos_formFind_path')->get('/vuelos/formfind','VueloController@formFind');

Route::name('vuelos_por_viaje')->get('/vuelos/{viaje_id}','VueloController@findVuelosPorViaje');

Route::name('vuelos_find_path')->post('/vuelos/find','VueloController@find');

Route::name('viajes_path')->get('/viajes','ViajeController@index');