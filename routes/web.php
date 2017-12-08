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

Route::resource('vehiculos', 'VehiculoController', ['only' => ['index','show']]);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('fabricantes','FabricanteController');
Route::resource('fabricantes.vehiculos','FabricanteVehiculoController', ['except' =>['show']]);