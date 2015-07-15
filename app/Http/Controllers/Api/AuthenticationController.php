<?php

namespace App\Http\Controllers\Api;

use App\Application;
use App\Http\Controllers\Controller;

/**
 * Controller for the API Authentication process.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class AuthenticationController extends Controller
{
	/**
	 * Authenticate the given api key is valid or not.
	 *
	 * @param  string $key
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	public function authenticate($key)
	{
		$app = Application::where('key', '=', $key)->first();

		if ( is_null($app) || $app->disable) {
			return response_unauthorized();
		}

		return response_ok($app);
	}
}