<?php

use Faker\Generator as Faker;
use App\Models\Admin\OrderDetail;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween(1, 30),
        'product_id' => $faker->numberBetween(15, 20),
        'quantity' => $faker->numberBetween(10, 150),
        'price' => $faker->randomFloat(null,10, 50000),
        'total' => 12,
    ];
});
