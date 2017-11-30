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

/**
 * descomentar estas rutas solo si no quieres el vuetify 
 */
//Route::get('/{id?}', 'maps@renderMap');
//Route::get('obtenerParadas/{id}', 'maps@obtenerParadas');
//Route::get('horarios/{id?}', 'maps@obtenerHorarios');

/**
 * rutas utilizadas 
 */
 
Route::get('/', function () {
	   
    return view('admin.main');
    
});

Route::get('layout', function () {
	   
    return view('admin.layout');
    
});


Route::resource('rutas', 'rutaController');

Route::resource('paradas', 'paradaController');

Route::resource('paradasUcs', 'paradasUcController');

Route::resource('horarioUcMs', 'horarioUcMController');

Route::resource('horarioMUcs', 'horarioMUcController');