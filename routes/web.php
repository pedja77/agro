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

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/home', 'HomeController@setHome')->name('home');
Route::get('/catalog', 'ProductsController@index')->name('catalog');
Route::get('/catalog/{id}', 'CatalogController@showProduct')->name('show-product');
Route::get('/sale', 'SaleController@setSale')->name('sale');
Route::get('/services', 'ServicesController@setServices')->name('services');
Route::get('/register', 'AuthController@showRegisterForm');
Route::post('/register', 'AuthController@register');
Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
