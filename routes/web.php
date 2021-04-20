<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::post('/verification','App\Http\Controllers\UserController@search' );

Route::get('/registerclient', function () {
    return view('register_client');
});
Route::post('/verifyclient','App\Http\Controllers\ClientController@store' );