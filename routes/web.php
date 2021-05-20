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

Route::middleware('auth' )->group(function () {
    Route::post('/verification','UserController@search' );

//mostrar clientes
Route::get('/clients', 'ClientController@index')->name('clients');
Route::post('/clients','ClientController@store' );
Route::get('/clients/create','ClientController@create')->name('clients.create');
Route::get('/clients/{client}', "ClientController@show")->name('clients.show');



//registrar producto
Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products','ProductController@store' );
Route::get('/products/create','ProductController@create')->name('products.create');
Route::get('/products/{product}', "ProductController@show")->name('products.show');
Route::get('/',function(){
    return view('home');
})->name('home');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
