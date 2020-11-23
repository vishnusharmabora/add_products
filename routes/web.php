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

Auth::routes();
Route::get('/', 'ProductController@products')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_product', 'ProductController@add_product')->name('add_product');
Route::post('/add_product', 'ProductController@store')->name('add_product.insert');
Route::get('/my_product', 'HomeController@product')->name('product');

