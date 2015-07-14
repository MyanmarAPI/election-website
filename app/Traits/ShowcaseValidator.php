<?php

namespace App\Traits;

use Validator;
use App\Showcase;

/**
 * Trait for showcase validation.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
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
            'url' => 'required|url',
            'icon' => 'required|url',
        ]);

        $v->sometimes('screenshots', 'required', function($input) {
            return $input->published == 'p';
        });

        return $v;
    }

}