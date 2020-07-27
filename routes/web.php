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

Route::get('/', 'ProductController@index');
Route::get('/cart/{id}', 'CartController@show')->name('cart.show');
Route::get('/cart/{id}/edit', 'CartController@edit')->name('cart.edit');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{id}', 'CartController@emptyCart')->name('cart.empty');
Route::delete('/item/{id}', 'CartController@deleteItem')->name('item.delete');
Route::get('/addToCart/{product_id}/{cart_id}', 'ProductController@addToCart')->name('addToCart');
