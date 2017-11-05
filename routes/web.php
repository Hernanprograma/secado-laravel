<?php

use proyectoPrueba\MuestrasCamion;
use proyectoPrueba\LineaMuestra;
use proyectoPrueba\User;

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

Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => 'admin'], function () {
  Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');
  Route::get('admin', 'AdminController@admin');
  });

  Route::get('register', 'RegisterController@showRegistrationForm');


  Route::post('/simbiotica/export', 'SimbioticaCaudalController@exportsimbiotica');
  Route::post('/muestrascamion/export', 'MuestrasCamionController@exportsimbiotica');


  Route::post('/simbiotica/search', 'SimbioticaCaudalController@search');
  Route::post('/muestrascamion/search', 'MuestrasCamionController@search');


  Route::resource('lineamuestras', 'LineaMuestrasController');
  Route::resource('muestrascamion', 'MuestrasCamionController');
  Route::resource('gasconsumo', 'GasConsumoController');
  Route::resource('simbiotica', 'SimbioticaCaudalController');
});
  Auth::routes();

  Route::get('/home', 'HomeController@index');
