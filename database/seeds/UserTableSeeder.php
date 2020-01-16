<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\User;
use Faker\Generator as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
            'code' => uniqid(),
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'name' => 'admin',
            'birthday' => '1997-07-07',
            'gender' => 'male',
            'email'    => 'admin@gmail.com',
            'address' => 'Korea',
            'phone'    => '0123456789',
            'rule'     => 1,
            'address'  => 'admin',
            'status'   => 1
        ]);
        factory(User::class, 20)->create();
    }
}
