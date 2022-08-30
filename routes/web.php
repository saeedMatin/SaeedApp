<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('login')->namespace('App\Http\Controllers')->group(function () {
//     Route::get('/', 'LoginController@index');

//     Route::post('/createcode', 'LoginController@CreateCode');

//     // Route::get('/createcode', 'LoginController@_CreateCode');

//     Route::post('/CheckCode', 'LoginController@CheckCode');
// });
Route::prefix('login')->namespace('App\Http\Controllers')->group(function () {
    Route::view('/', 'login/login', data: ['title' => 'login']);

    Route::post('/', 'LoginController@CreateCode');

    // Route::get('/createcode', 'LoginController@_CreateCode');

    Route::post('/CheckCode', 'LoginController@CheckCode');
});
