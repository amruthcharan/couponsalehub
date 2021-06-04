<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {

    $title = $faker->words(2, true);
    $slug = str_replace(" ","_",$title);

    return [
        'name'             => $title,
        'logo'             => "posts/post" . rand(1,4) .".jpg",
        'slug'             => $slug,
        'feature_image'    => "posts/post" . rand(1,4) .".jpg",
        'custom_keyword'   => 'Discount Code',
        'website_url'      => 'https://'.$faker->domainName,
        'top_review'       => 1,
        'popular_store'    => 1,
        'seo_title'        => $faker->sentence(4),
        'seo_description'  => $faker->sentence(8),
        'is_enabled'       => true,
    ];
});
