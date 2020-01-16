<?php
use App\Models\Admin\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'code' => uniqid(),
        'username' => $faker->unique()->lastName,
        'password' => bcrypt('123456'),
        'name' => 'admin',
        'gender' => $faker->randomElement(['male', 'female']),
        'email'    => $faker->unique()->safeEmail,
        'phone'    => '0384946866',
        'address'  => $faker->address,
        'rule'     => $faker->randomElement([1, 2, 3]),
        'status'   => $faker->randomElement([1, 2, 3, 4]),
        'remember_token' => str_random(10),
    ];    
});
