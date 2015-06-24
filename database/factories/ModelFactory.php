<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
	$role = ['admin', 'user'];

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'status' => 'a',
        'role'	=> $role[array_rand($role, 1)],
        'password' => str_random(10),
        //'remember_token' => str_random(10),
    ];
});
