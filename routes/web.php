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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index');

Route::get('/cart', 'CartController@index');
Route::get('/cart/add/product/{product}/', 'CartController@store');
Route::post('/cart/update/{cart}/', 'CartController@update');
Route::get('/cart/delete/{cart}/', 'CartController@destroy');

Route::post('/order/create/', 'OrderController@store');
Route::get('/order/', 'OrderController@index');

