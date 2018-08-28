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
});

Route::get('/home', 'HomeController@index');

Route::post('/payment', 'HomeController@payment');

Route::get('/room', 'HomeController@room');

Route::get('/contact', 'HomeController@contact');

Route::post('/confirm', 'HomeController@confirm');

Route::get('/booking', 'HomeController@booking');

Route::get('/blog', 'HomeController@blog');

Route::get('/about', 'HomeController@about');

Route::get('/filter','HomeController@filterHotels');
