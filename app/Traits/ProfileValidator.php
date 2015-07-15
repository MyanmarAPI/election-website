<?php

namespace App\Traits;

use Hash;
use Validator;
use App\User;

/**
 * Trait for profile validator.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

trait ProfileValidator
{
	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorForProfile(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$this->user->id . ',_id'
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorForPassword(array $data)
    {
        return Validator::make($data, [
            'old_password'  => 'required',
            'password'      => 'required|confirmed|min:6'
        ]);
    }

    /**
     * Check password from input is same with data from model.
     *
     * @param  \App\User   $user
     * @param  string $inputPassword
     * @return boolean
     */
    protected function checkPassword(User $user, $inputPassword)
    {
        return Hash::check($inputPassword, $user->getAuthPassword());
    }
}