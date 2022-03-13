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

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index');

  Route::prefix('/product')->group(function () {
    Route::get('/', 'ProductController@index');
    Route::get('/add', 'ProductController@addView');
    Route::get('/get_data', 'ProductController@getDataProduct');
    Route::get('/get_transaction/{id}', 'ProductController@getDataTransaction');
    Route::get('/get_stock_diary/{id}', 'ProductController@getDataStockDiary');
    Route::get('/{id}', 'ProductController@detail');
    Route::get('/update/{id}', 'ProductController@updateView');
    Route::get('/delete/{id}', 'ProductController@delete');
    Route::post('/add', 'ProductController@add');
    Route::post('/update/{id}', 'ProductController@update');
  });

  Route::prefix('/category')->group(function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/add', 'CategoryController@addView');
    Route::get('/get_data', 'CategoryController@getDataCategory');
    Route::get('/update/{id}', 'CategoryController@updateView');
    Route::get('/delete/{id}', 'CategoryController@delete');
    Route::post('/add', 'CategoryController@add');
    Route::post('/update/{id}', 'CategoryController@update');
  });

  Route::prefix('/user')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/add', 'UserController@addView');
    Route::get('/get_data', 'UserController@getDataUser');
    Route::get('/update/{id}', 'UserController@updateView');
    Route::get('/delete/{id}', 'UserController@delete');
    Route::post('/add', 'UserController@add');
    Route::post('/update/{id}', 'UserController@update');
  });

  Route::prefix('/supplier')->group(function () {
    Route::get('/', 'SupplierController@index');
    Route::get('/add', 'SupplierController@addView');
    Route::get('/get_data', 'SupplierController@getDataSupplier');
    Route::get('/update/{id}', 'SupplierController@updateView');
    Route::get('/delete/{id}', 'SupplierController@delete');
    Route::post('/add', 'SupplierController@add');
    Route::post('/update/{id}', 'SupplierController@update');
  });

  Route::prefix('/pelanggan')->group(function () {
    Route::get('/', 'PelangganController@index');
    Route::get('/get_data', 'PelangganController@getDataPelanggan');
    Route::get('/{id}', 'PelangganController@detail');
    Route::get('/delete/{id}', 'PelangganController@delete');
  });
  
  Route::prefix('/transaksi_penjualan')->group(function () {
    Route::get('/', 'TransaksiPenjualanController@index');
    Route::get('/get_data', 'TransaksiPenjualanController@get_data');
  });
  
  Route::prefix('/transaksi_pembelian')->group(function () {
    Route::get('/', 'TransaksiPembelianController@index');
    Route::get('/get_data', 'TransaksiPembelianController@get_data');
  });

  Route::post('/logout', 'LoginController@logout');
});

Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');

Route::get('/', 'FrontpageController@index');

Route::prefix('/checkout')->group(function () {
  Route::get('/{id}', 'FrontpageController@checkout');
  Route::post('/process', 'FrontpageController@checkoutProcess');
});