<?php

use Faker\Generator;
use Tests\Fakes\Authenticable;

$factory->define(Authenticable::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'role_id' => 0
    ];
});