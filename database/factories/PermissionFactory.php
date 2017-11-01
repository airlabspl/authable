<?php

use Airlabs\Authable\Permission;
use Faker\Generator;

$factory->define(Permission::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'key' => $faker->unique()->slug
    ];
});