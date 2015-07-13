<?php

namespace App\Http\Controllers\Api;

use App\Application;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{

	public function authenticate($key)
	{
		$app = Application::where('key', '=', $key)->first();

		if ( is_null($app) || $app->disable) {
			return response_unauthorized();
		}

		return response_ok($app);
	}
}