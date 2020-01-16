<?php

use Faker\Generator as Faker;

use App\Models\Admin\Brand;
$factory->define(Brand::class, function (Faker $faker) {
    return [
        'code' => "code".$faker->unique()->numberBetween(1, 9999),
        'name' => $faker->unique()->lastName,
        'image' => $faker->imageUrl($width = 210  , $height = 210, 'technics'),
        // 'type' => $faker->numberBetween(1, 3),
    ];
});
