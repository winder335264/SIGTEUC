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


Route::resource('rutas', 'rutaAPIController');

Route::resource('paradas', 'paradaAPIController');
Route::get('paradasRutas', 'paradaAPIController@getinforutascercanas');
Route::get('paradasByrutaId/{id}', 'paradaAPIController@getParadasByRutaId');

Route::resource('paradas_ucs', 'paradasUcAPIController');

Route::resource('horario_uc_ms', 'horarioUcMAPIController');

Route::resource('horario_m_ucs', 'horarioMUcAPIController');

Route::get('horarios/{idruta}','paradaAPIController@getHorarios');

//Route::get('buscar/{string}','paradaAPIController@getHorarios');


Route::resource('h_o_r_a_r_i_o__m__u_c_s', 'HORARIO_M_UCAPIController');

Route::resource('users', 'usersAPIController');