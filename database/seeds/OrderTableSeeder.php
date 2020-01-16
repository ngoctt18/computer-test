<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 36)->create();
    }
}
