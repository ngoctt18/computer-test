<?php

use Faker\Generator as Faker;
use App\Models\Admin\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 20),
        'total_money' => $faker->numberBetween(1000, 20000),
        'request' => 'text',
        'date_input' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'delivered' => 'text',
        'address' => $faker->address,
        'status' => $faker->numberBetween(1, 3),
        'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
