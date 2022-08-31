<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('login.login', ['title' => 'Login Page']);
});

Route::prefix('login')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'LoginController@index');

    Route::post('/createcode', 'LoginController@CreateCode');

    Route::get('/confirm', 'LoginController@ConfirmCode');

    Route::post('/confirm', 'LoginController@CheckCode');

    Route::get('/success', 'LoginController@Success');
});
