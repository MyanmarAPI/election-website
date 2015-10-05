<?php
use App\Showcase;
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

// Frontend page routes.
Route::get('/', function () {
	
	$slug='mvoter-2015';
	$app = Showcase::where('published', 'p')
                        ->where('approved', true)
                        ->where('slug', $slug)
                        ->firstOrFail();
    return view('static.home', compact('app'));
});

Route::get('/about', function () {
	return view('static.about');
});

Route::get('/beta', function () {
	return view('static.beta');
});

Route::get('/hackchallenge', function () {
	return view('static.hackchallenge');
});

Route::get('/pressrelease', function () {
	return view('static.pressrelease');
});

Route::get('/faq', function () {
	return view('static.faq');
});

Route::get('/contact', function () {
	return view('static.contact');
});

// Showcase Frontend Controller
Route::group(['prefix' => 'showcase'], 
function() {
	Route::get('/', [
		'as' => 'showcase.lists',
		'uses' => 'ShowcaseFrontendController@index'
	]);

	Route::get('/preview/{slug}', [
		'as' => 'showcase.preview',
		'uses' => 'ShowcaseFrontendController@preview',
		'middleware' => 'auth'
	]);

	Route::get('/{slug}', [
		'as' => 'showcase.show',
		'uses' => 'ShowcaseFrontendController@show'
	]);
});

// Authentication process routes.
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Backend routes.
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'],
function() {

	// Dashboard route.
	Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'DashboardController@index'
	]);

	// API Application Routes.
	Route::group(['prefix' => 'applications'], 
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

		Route::get('{id}/disable', [
			'middleware' => 'admin',
			'as' => 'application.disable',
			'uses' => 'ApplicationController@disable'
		]);

		Route::get('{id}/enable', [
			'middleware' => 'admin',
			'as' => 'application.enable',
			'uses' => 'ApplicationController@enable'
		]);

		Route::get('{id}', [
			'as' => 'application.view',
			'uses' => 'ApplicationController@show'
		]);
	});


	// Showcase Backend Routes
	Route::group(['prefix' => 'showcase'], 
	function() {
		Route::get('/', [
			'as' => 'showcase',
			'uses' => 'ShowcaseController@index'
		]);

		Route::get('/create', [
			'as' => 'showcase.create',
			'uses' => 'ShowcaseController@create'
		]);

		Route::post('/create', [
			'as' => 'showcase.store',
			'uses' => 'ShowcaseController@store'
		]);

		Route::get('/{id}/edit', [
			'as' => 'showcase.edit',
			'uses' => 'ShowcaseController@edit'
		]);

		Route::post('/{id}/edit', [
			'as' => 'showcase.update',
			'uses' => 'ShowcaseController@update'
		]);

		Route::get('/{id}/icon', [
			'as' => 'showcase.icon',
			'uses' => 'ShowcaseController@icon'
		]);

		Route::post('/{id}/icon', [
			'as' => 'showcase.postIcon',
			'uses' => 'ShowcaseController@postIcon'
		]);

		Route::get('/{id}/screenshots', [
			'as' => 'showcase.screenshots',
			'uses' => 'ShowcaseController@screenshots'
		]);

		Route::get('/{id}/screenshots/remove', [
			'as' => 'showcase.screenshotsRemove',
			'uses' => 'ShowcaseController@screenshotsRemove'
		]);

		Route::post('/{id}/screenshots', [
			'as' => 'showcase.postScreenshots',
			'uses' => 'ShowcaseController@postScreenshots'
		]);

		Route::get('/{id}/publish', [
			'as' => 'showcase.publish',
			'uses' => 'ShowcaseController@publish'
		]);

		Route::get('/{id}/draft', [
			'as' => 'showcase.draft',
			'uses' => 'ShowcaseController@draft'
		]);
	});

	// User Panel Routes for Admin.
	Route::group(['middleware' => ['admin'], 'prefix' => 'users'], 
	function() {
		Route::get('/', [
			'as' => 'user',
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
	});

	// Admin Member Panel Routes for Admin Users.
	Route::group(['middleware' => ['admin'], 'prefix' => 'members'], 
	function() {
		Route::get('/', [
			'as' => 'members',
			'uses' => 'MemberController@index'
		]);

		Route::get('/create', [
			'as' => 'member.create',
			'uses' => 'MemberController@getCreate'
		]);

		Route::post('/create', [
			'as' => 'member.store',
			'uses' => 'MemberController@postCreate'
		]);

		Route::get('{id}/delete', [
			'as' => 'member.delete',
			'uses' => 'MemberController@destroy'
		]);
	});

	// Search backend routes for admin
	Route::group(['middleware' => 'admin', 'prefix' => 'search'], 
	function() {
		Route::get('search/user', [
			'as' => 'search::user',
			'uses' => 'SearchController@user'
		]);
		Route::get('search/member', [
			'as' => 'search::member',
			'uses' => 'SearchController@member'
		]);
		Route::get('search/application', [
			'as' => 'search::application',
			'uses' => 'SearchController@application'
		]);
	});
});
		

// User Profile Routes
Route::group(['middleware' => 'auth', 'prefix' => 'profile'], 
function() {
	Route::get('/', [
		'as' => 'profile',
		'uses' => 'ProfileController@getProfile'
	]);

	Route::post('/', [
		'as' => 'profile.update',
		'uses' => 'ProfileController@postProfile'
	]);

	Route::get('/password', [
		'as' => 'profile.password',
		'uses' => 'ProfileController@getPassword'
	]);

	Route::post('/password', [
		'as' => 'profile.password.update',
		'uses' => 'ProfileController@postPassword'
	]);
});


// Admin Action Routes for Admin Users.
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'actions'], 
function() {
	Route::get('/{id}/promote', [
		'as' => 'action.promote',
		'uses' => 'AdminActionController@promoteUserToAdmin'
	]);

	Route::get('/{id}/downgrade', [
		'as' => 'action.downgrade',
		'uses' => 'AdminActionController@downgradeAdminToUser'
	]);

	Route::get('/showcase/{id}/activate', [
		'as' => 'action.showcase.activate',
		'uses' => 'AdminActionController@activateShowcase'
	]);

	Route::get('/showcase/{id}/deactivate', [
		'as' => 'action.showcase.deactivate',
		'uses' => 'AdminActionController@deactivateShowcase'
	]);

	Route::get('/showcase/{id}/sticky', [
		'as' => 'action.showcase.sticky',
		'uses' => 'AdminActionController@stickyShowcase'
	]);

	Route::get('/showcase/{id}/homepage', [
		'as' => 'action.showcase.homepage',
		'uses' => 'AdminActionController@homepageShowcase'
	]);
});

// Authentication api route.
Route::get('/api/v1/authenticate/{key}', [
	'as' => 'api::authenticate',
	//'middleware' => 'api',
	'uses' => 'Api\AuthenticationController@authenticate', 
]);

// Token Generate api route.
Route::get('/api/v1/token/generate/{key}', [
	'as' => 'api::token',
	//'middleware' => 'api',
	'uses' => 'Api\TokenGenerationController@generate', 
]);

//Analytic Route
Route::group(['middleware' => 'auth', 'prefix' => 'api/v1/analytics'],
function(){

	Route::get('/data/{type?}', [
		'as' => 'api.analytic.data',
		'uses' => 'AnalyticController@getDefault'
	]);

	Route::get('/total-hits', [
		'as' => 'api.analytic.total_hits',
		'uses' => 'AnalyticController@getTotalHits'
	]);

	Route::get('/unique-user-count', [
		'as' => 'api.analytic.uu.count',
		'uses' => 'AnalyticController@getUniqueUserCount'
	]);

});

Route::get('tempfix', function() {
	$all = App\Showcase::all();

	foreach ($all as $key => $value) {
		$value->type = (array) $value->type;
		$value->save();
	}
});