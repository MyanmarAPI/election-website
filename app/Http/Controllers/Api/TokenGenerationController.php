<?php

namespace App\Http\Controllers\Api;

use App\Token;
use App\Application;
use App\Http\Controllers\Controller;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

/**
 * Controller for the API Request Token Generate process.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TokenGenerationController extends Controller
{
	/**
	 * Generate the token for given api key.
	 *
	 * @param  string $key
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	public function generate($key)
	{
		$app = Application::where('key', '=', $key)->first();

		if ( is_null($app) || $app->disable) {

			$msg = is_null($app) ? 'Invalid app key' : 'Application is disable';

			return response_unauthorized($msg);
		}

		$tokenValue = $this->getUUID5Token($app);

		if ( $tokenValue) {
			$token = new Token;
			$token->app_id = $app->id; // Application ID
			$token->app_key = $app->key; // Application Key
			$token->user_id = $app->user_id; // Application owner id
			$token->token = $tokenValue; // Token for unique user.

			if ($token->save()) {
				return response_ok($token);		
			}
		}

		return response_error('Error occured to generate token. Please try again');		
	}

	/**
	 * Get token value with UUID5 string.
	 *
	 * @param  \App\Application $app
	 * @return string|null
	 */
	private function getUUID5Token(Application $app)
	{
		try {
			$uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . $app->name . $app->type);

			return $uuid5->toString();

		} catch (UnsatisfiedDependencyException $e) {
			return null;
		}
	}
}