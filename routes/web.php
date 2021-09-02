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

Route::get('/clients/{client}/edit','ClientController@edit');
Route::patch('/clients/{client}/edit','ClientController@update' );

Route::get('/clients/{client}/saldo','ClientController@editBalance');
Route::patch('/clients/{client}/saldo','ClientController@updateBalance' );


//registrar producto
Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products','ProductController@store' );
Route::get('/products/create','ProductController@create')->name('products.create');
Route::get('/products/{product}', "ProductController@show")->name('products.show');


Route::get('/products/{product}/edit','ProductController@edit');
Route::patch('/products/{product}/edit','ProductController@update' );

Route::get('/products/{product}/inventario','ProductController@editBalance');
Route::patch('/products/{product}/inventario','ProductController@updateBalance' );

//registrar producto
Route::get('/sales', 'SaleController@index')->name('sales');
Route::post('/sales','SaleController@store' );
Route::get('/sales/create','SaleController@create')->name('sales.create');
Route::get('/sales/{sale}', "SaleController@show")->name('sales.show');

Route::get('/sales/{sale}/edit','SaleController@edit')->name('sales.edit');
Route::patch('/sales/{sale}/edit','SaleController@update' );
Route::get('/home',function(){
    return view('home');
});
Route::get('/',function(){
    return view('home');
})->name('home');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
