<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'type'  => Coupon::TYPES[rand(0,1)],
        'title' => $faker->words(3, true),
        'code'  => $faker->word,
        'is_editor_pick' => false,
        'description' => $faker->sentence,
        'editor_order' => rand(1,10),
        'coupon_text' => $faker->word
    ];
});
