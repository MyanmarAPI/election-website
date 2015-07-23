<?php

namespace App\Http\Controllers\Api;

use App\Token;
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
	 * Authenticate the given request token is valid or not.
	 *
	 * @param  string $token
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	public function authenticate($token)
	{
		$token = Token::where('token', '=', $token)->first();

		if ( is_null($token) || $token->disable) {
			
			$msg = is_null($token) ? 'Invalid token' : 'Application is disable';

			return response_unauthorized($msg);
		}

		return response_ok($token);
	}
}