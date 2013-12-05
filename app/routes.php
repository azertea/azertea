<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('test');
});

Route::get('/user/connect', 'UserController@getUserConnect');
Route::post('/user/connect', 'UserController@postUserConnect');
Route::get('/user/testEmail', 'UserController@getUserTestEmail');

Route::get('/product/list', 'ProductController@getProductList');
Route::get('/product/add', 'ProductController@getProductAdd');
Route::post('/product/add', 'ProductController@postProductAdd');
Route::get('/send-product', 'ProductController@getProductSend');
Route::post('/send-product', 'ProductController@postProductSend');
Route::get('{idProduct}-{slug-product}}', 'ProductController@getProduct')
	->where('slug-product', '[a-zA-Z0-9-]+')
	->where('id', '[0-9]+')
;

Route::get('/element', 'ElementController@getElement');
Route::post('/element', 'ElementController@postElement');

Route::post('/search', 'SearchController@postSearch');
Route::post('/tree', 'TreeController@postTree');
