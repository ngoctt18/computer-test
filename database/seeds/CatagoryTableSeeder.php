<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Catagory;

class CatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catagories')->insert([
            ['code' => 1, 'name' => 'Laptops', 'image' => 'assets/img/categorie/categorie.png','created_at' => '2019-02-27 15:12:52'],
            ['code' => 2,'name' => 'Computer', 'image' => 'assets/img/categorie/categorie.png','created_at' => '2019-02-27 15:12:52'],
            ['code' => 3,'name' => 'Accessories', 'image' => 'assets/img/categorie/categorie.png','created_at' => '2019-02-27 15:12:52'],
            ['code' => 4,'name' => 'Tablet', 'image' => 'assets/img/categorie/categorie.png','created_at' => '2019-02-27 15:12:52'],
        ]);
    }
}
