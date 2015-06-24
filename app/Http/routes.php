<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('static.home');
});

Route::get('/about', function () {
	return view('static.about');
});

Route::get('/contact', function () {
	return view('static.contact');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('dashboard', [
	'as' => 'dashboard',
	'middleware' => 'auth',
	'uses' => 'DashboardController@index'
]);

// API Application Routes.
Route::group(['middleware' => 'auth', 'prefix' => 'applications'], 
function() {
	Route::get('/', [
		'as' => 'application',
		'uses' => 'ApplicationController@index'
	]);

	Route::get('/create', [
		'as' => 'application.create',
		'uses' => 'ApplicationController@create'
	]);

	Route::post('/create', [
		'as' => 'application.store',
		'uses' => 'ApplicationController@store'
	]);

	Route::get('/{id}/edit', [
		'as' => 'application.edit',
		'uses' => 'ApplicationController@edit'
	]);

	Route::post('{id}/edit', [
		'as' => 'application.update',
		'uses' => 'ApplicationController@update'
	]);

	Route::get('{id}/delete', [
		'as' => 'application.delete',
		'uses' => 'ApplicationController@destroy'
	]);
});

// User Panel Routes for Admin.
Route::group(['middleware' => 'auth', 'prefix' => 'users'], 
function() {
	Route::get('/', [
		'as' => 'users',
		'uses' => 'UserController@index'
	]);

	Route::get('/{id}/ban', [
		'as' => 'user.ban',
		'uses' => 'UserController@ban'
	]);

	Route::get('/{id}/unban', [
		'as' => 'user.unban',
		'uses' => 'UserController@unban'
	]);

	Route::get('{id}/delete', [
		'as' => 'user.delete',
		'uses' => 'UserController@destroy'
	]);

	/*Route::get('/create', [
		'as' => 'application.create',
		'uses' => 'ApplicationController@create'
	]);

	Route::post('/create', [
		'as' => 'application.store',
		'uses' => 'ApplicationController@store'
	]);

	Route::get('/edit', [
		'as' => 'application.edit',
		'uses' => 'ApplicationController@edit'
	]);

	Route::post('/update', [
		'as' => 'application.update',
		'uses' => 'ApplicationController@update'
	]);*/
});

Route::get('/api/v1/authenticate/{key}', [
	'as' => 'api::authenticate',
	'middleware' => 'api',
	'uses' => 'Api\AuthenticationController@authenticate', 
]);
