<?php

namespace App\Util;

use App\User;
use App\Application;
use RuntimeException;

/**
 * Key Generator for API.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class AppKeyGenerator
{
	/**
	 * @var \App\User
	 */
	protected $user;

	/**
	 * Create new app key generator instance.
	 *
	 * @param \App\User|null $user
	 */
	public function __construct(User $user = null)
	{
		$this->user($user);
	}

	/**
	 * Set user object.
	 *
	 * @param  User|null $user
	 * @return \App\Util\AppKeyGenerator
	 */
	public function user(User $user = null)
	{
		if ( ! is_null($user)) {
			$this->user = $user;
		}

		return $this;
	}

	/**
	 * Generate the key for given application.
	 *
	 * @param  \App\Application $app
	 * @return string
	 * @throws \RuntimeException If User object is null
	 */
	public function generate(Application $app)
	{
		if ( is_null($this->user)) {
			throw new RuntimeException("Need to set User object to key generate.");
		}

		return sha1(md5($app->id . $this->user->id) . time() . mt_rand());
	}
}