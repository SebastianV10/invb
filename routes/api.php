<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return view('auth/login');
 });
 Route::get('/edificio','EdificioController@index')->name('edificio');
 Route::post('/agregarEdificio','EdificioController@store')->name('agregarEdificio');
 Route::get('/editaredificio/{id}','EdificioController@edit')->name('editaredificio');
 Route::put('/actualizaredificio/{id}','EdificioController@update')->name('actualizaredificio');
 Route::delete('/eliminaredificio/{id}','EdificioController@destroy')->name('eliminaredificio');
 
 
 Route::get('/tipo_marca','TipoMarcaController@index')->name('tipo_marca');
 Route::post('/agregarTipo_marca','TipoMarcaController@store')->name('agregarTipo_marca');
 Route::get('/editar_tipo_marca/{id}','TipoMarcaController@edit')->name('editar_tipo_marca');
 Route::put('/update_tipo_marca/{id}','TipoMarcaController@update')->name('update_tipo_marca');
 Route::delete('/eliminar_tipo_marca/{id}','TipoMarcaController@destroy')->name('eliminar_tipo_marca');
 
 Route::get('/tipo_equipo','TipoEquipoController@index')->name('tipo_equipo');
 Route::post('/agregartipo_equipo','TipoEquipoController@store')->name('agregartipo_equipo');
 Route::get('/editar_tipo_equipo/{id}','TipoEquipoController@edit')->name('editar_tipo_equipo');
 Route::put('/update_tipo_equipo/{id}','TipoEquipoController@update')->name('update_tipo_equipo');
 Route::delete('/eliminar_tipo_equipo/{id}','TipoEquipoController@destroy')->name('eliminar_tipo_equipo');
 
 
 Route::get('/versalon/{id_edificio}','SalonController@show')->name('versalon');
 
 Route::post('/agregarsalon','SalonController@store')->name('agregarsalon');
 Route::get('/editar_salon/{id}','SalonController@edit')->name('editar_salon');
 Route::put('/update_salon/{id}','SalonController@update')->name('update_salon');
 Route::delete('/eliminar_salon/{id}','SalonController@destroy')->name('eliminar_salon');
 
 Route::get('/verequipo/{id_salon}','EquipoController@show')->name('verequipo');
 
 Route::post('/agregarequipo','EquipoController@store')->name('agregarequipo');
 Route::get('/editar_equipo/{id}','EquipoController@edit')->name('editar_equipo');
 Route::put('/update_equipo/{id}','EquipoController@update')->name('update_equipo');
 Route::delete('/eliminar_equipo/{id}','EquipoController@destroy')->name('eliminar_equipo');
 
 
 
 
 
 Auth::routes();
 
 Route::get('/home', 'HomeController@index')->name('home');
 
