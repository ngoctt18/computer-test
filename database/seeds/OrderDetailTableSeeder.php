<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\OrderDetail;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderDetail::class, 100)->create();
    }
}
