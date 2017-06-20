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

//Route::group(['middleware' => 'auth'], function()
//{
	Route::post('remisiones/confirmar', 'RemisionEntradaController@Confirm')->name('confirm');
	Route::post('remisiones/anular', 'RemisionEntradaController@Anular')->name('anular');
	Route::post('remisiones/add-producto', 'RemisionEntradaController@add_producto')->name('add_producto_to_remision');
	Route::resource('proveedores', 'ProveedorController');
	Route::resource('productos', 'ProductoController');
	Route::resource('remisiones', 'RemisionEntradaController');
	Route::resource('almacenes', 'AlmacenController');

//});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
