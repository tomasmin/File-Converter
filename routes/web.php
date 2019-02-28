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
    return view('audio');
});

Route::get('/audio', function () {
    return view('audio');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/audio/submit', 'AudioController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
