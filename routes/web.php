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

//registrar cliente
Route::get('/', function () {
    return view('login');
});
Route::post('/verification','UserController@search' );

//mostrar clientes
Route::get('/clients', 'ClientController@index');
Route::post('/clients','ClientController@store' );
Route::get('/clients/create','ClientController@create');
Route::get('/clients/{client}', "ClientController@show")->name('clients.show');



//registrar producto
Route::get('/products', 'ProductController@index');
Route::post('/products','ProductController@store' );
Route::get('/products/create','ProductController@create');
Route::get('/products/{product}', "ProductController@show")->name('products.show');
