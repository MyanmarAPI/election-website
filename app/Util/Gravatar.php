<?php

namespace App\Util;

/**
 * Gravatar image helper class.
 */
class Gravatar
{
	/**
	 * Email address hashed string for gravatar
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * Url for gravatar link
	 *
	 * @var string
	 */
	protected $gravatarUrl = 'http://www.gravatar.com/avatar/';

	/**
	 * Create new Gravatar instance
	 *
	 * @param string $email
	 */
	public function __construct($email)
	{
		$this->email = md5(strtolower($email));
	}

	/**
	 * Get url for gravatar image.
	 *
	 * @param  integer $size
	 * @param  string  $deafult
	 * @param  string  $rating
	 * @return string
	 */
	public function url($size = 50, $deafult = 'retro', $rating = 'g')
	{
		$query = http_build_query([
			's' => $size,
			'd' => $deafult,
			'r' => $rating,
		]);

		return  $this->gravatarUrl . $this->email . '?' . $query;
	}
}