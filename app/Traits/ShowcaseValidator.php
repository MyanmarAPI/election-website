<?php

namespace App\Traits;

use Validator;
use App\Showcase;

/**
 * Trait for showcase validator.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


trait ShowcaseValidator
{
	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $v = Validator::make($data, [
            'name' => 'required|max:255',
            'url' => 'required|url'
        ]);

        return $v;
    }

}