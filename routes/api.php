<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/catalog', 'ProductsController@indexWithFilters');
Route::get('/categories', 'CategoryController@index');
Route::get('catalog/types', 'ProductsController@getTypes');
Route::get('catalog/groups', 'ProductsController@getGroups');
Route::get('/bore-diameters', 'ProductsController@getBoreDiameters');
