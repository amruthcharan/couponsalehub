<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Heading;
use Faker\Generator as Faker;

$factory->define(Heading::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(3),
        'description' => $faker->paragraph(1),
        'order'       => rand(1,3),
    ];
});
