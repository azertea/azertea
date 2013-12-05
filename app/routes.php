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
	return View::make('index');
});


Route::get('/user/connect', 'UserController@getLogin');
Route::post('/user/connect', 'UserController@postLogin');
Route::get('/user/inscription', 'UserController@getInscritpion');
Route::post('/user/inscription', 'UserController@postInscritpion');
Route::get('/user/test-email', 'UserController@getUserTestEmail');


Route::get('/annonce/add', 'ProductController@getProductAdd');
Route::post('/annonce/add', 'ProductController@postProductAdd');


Route::get('/annonce/list', 'ProductController@getProductList');


Route::get('/send-annonce', 'ProductController@getProductSend');
Route::post('/send-annonce', 'ProductController@postProductSend');



Route::get('{idProduct}-{slug-annonce}}', 'ProductController@getProduct')
	->where('slug-annonce', '[a-zA-Z0-9-]+')
	->where('id', '[0-9]+');

Route::post('/search', 'SearchController@postSearch');
Route::post('/tree', 'TreeController@postTree');
