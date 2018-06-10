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

Route::get('/', 'HomeController@setHome')->name('home');
Route::get('/catalog', 'CatalogController@setCatalog')->name('catalog');
Route::get('/catalog/{id}', 'CatalogController@showProduct')->name('show-product');
Route::get('/sale', 'SaleController@setSale')->name('sale');
Route::get('/services', 'ServicesController@setServices')->name('services');
