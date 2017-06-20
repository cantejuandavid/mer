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
})->name('home');


Route::post('remisiones/confirmar', 'RemisionEntradaController@Confirm')->name('confirm');
Route::post('remisiones/anular', 'RemisionEntradaController@Anular')->name('anular');


Route::resource('proveedores', 'ProveedorController');
Route::resource('productos', 'ProductoController');
Route::resource('remisiones', 'RemisionEntradaController');
Route::resource('almacenes', 'AlmacenController');