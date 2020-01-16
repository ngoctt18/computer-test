<?php

use Faker\Generator as Faker;
use App\Models\Admin\Catagory;

$factory->define(Catagory::class, function (Faker $faker) {
    return [
        'code' => "code".$faker->unique()->numberBetween(1, 9999),
        'name' => $faker->lastName,
        'image' => $faker->imageUrl($width = 210  , $height = 210, 'technics'),
    ];
});
