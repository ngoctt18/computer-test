<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Brand::class, 10)->create();
    }
}
