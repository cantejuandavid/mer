<?php

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
