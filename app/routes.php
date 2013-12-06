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

// Package login
Route::post('/user/connect', 'UserController@postLogin');
Route::post('/user/inscription', 'UserController@postRegister');
Route::post('/user/test-email', 'UserController@postTestMail');

// Package peuplement
Route::get('/annonce/add', 'AnnonceController@getProductAdd');
Route::post('/annonce/add', 'AnnonceController@postAnnonce');

//Package de recherche depuis la page d'index
Route::post('/search', 'SearchController@postSearch');
Route::post('/tree', 'SearchController@postTree');
Route::post('/annonce/get', 'SearchController@postAnnonce');

// Affichage d'un article
Route::get('{idProduct}-{slug-annonce}}', 'ProductController@getProduct')
	->where('slug-annonce', '[a-zA-Z0-9-]+')
	->where('id', '[0-9]+');