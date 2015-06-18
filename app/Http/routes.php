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

Route::get('/api/v1/authenticate/{key}', [
	'as' => 'api::authenticate',
	'uses' => 'Api\AuthenticationController@authenticate', 
]);
