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

Route::get('/clients/{client}/edit','ClientController@edit')->name('clients.edit');
Route::patch('/clients/{client}/edit','ClientController@update' );
Route::patch('/clients/{client}/edit/{modal}','ClientController@updateModal' );


Route::get('/clients/{client}/saldo','ClientController@editBalance');
Route::patch('/clients/{client}/saldo','ClientController@updateBalance' );
Route::post('/clients/{client}/delete','ClientController@delete');



//registrar producto
Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products','ProductController@storeModal' );
Route::get('/products/create','ProductController@create')->name('products.create');
Route::get('/products/{product}', "ProductController@show")->name('products.show');


Route::get('/products/{product}/edit','ProductController@edit');
Route::patch('/products/{product}/edit','ProductController@update' );

Route::get('/products/{product}/inventario','ProductController@editBalance');
Route::patch('/products/{product}/inventario','ProductController@updateBalance' );

//registrar producto
Route::get('/sales', 'SaleControllerTest@index')->name('sales');

Route::get('/home','SaleControllerTest@create');

Route::get('/','SaleControllerTest@create')->name('home');



Route::post('/sales','SaleControllerTest@store' )->name('sales.store');
Route::get('/sales/create','SaleControllerTest@create')->name('sales.create');
Route::get('/sales/report','SaleControllerTest@report')->name('sales.report');
Route::get('/sales/report/csv','SaleControllerTest@generateCSV')->name('sales.generateCSV');


Route::get('/sales/{sale}', "SaleControllerTest@show")->name('sales.show');
Route::get('/sales/{sale}/edit','SaleControllerTest@edit')->name('sales.edit');
Route::patch('/sales/{sale}/edit','SaleControllerTest@update' );
Route::post('/sales/{sale}/delete','SaleControllerTest@delete');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
