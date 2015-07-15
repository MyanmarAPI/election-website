<?php

namespace App\Traits;

use App\User;

/**
 * Trait for user creation.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

trait CreateUser
{
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @param  string $role
     * @return User
     */
    protected function create(array $data, $role = 'user')
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 'a',
            'role' => $role
        ]);
    }
}
