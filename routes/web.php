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
 Route::get('/login', function () {
	   
    return view('auth.login');
    
});
 
Route::get('/', function () {
	   
    return view('admin.main');
    
});

Route::get('/siteucmyadmin', function () {
	   
    return view('auth.login');
    
});

Auth::routes();
Route::resource('rutas', 'rutaController');

Route::resource('paradas', 'paradaController');

Route::resource('paradasUcs', 'paradasUcController');

Route::resource('horarioUcMs', 'horarioUcMController');

Route::get('/home', 'HomeController@index');

Route::resource('hORARIOMUCS', 'HORARIO_M_UCController');

Route::resource('users', 'usersController');


