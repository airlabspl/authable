<?php

use Airlabs\Authable\Role;
use Faker\Generator;

$factory->define(Role::class, function (Generator $faker) {
    return [
      'name' => $faker->name
    ];
});