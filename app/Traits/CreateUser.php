<?php

namespace App\Traits;

use App\User;

/**
 * Trait for user creation.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
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
