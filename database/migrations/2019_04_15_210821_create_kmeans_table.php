<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKmeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kmeans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->double('price');
            $table->integer('warranty');
            $table->integer('brand_id');
            $table->integer('catagory_id');
            $table->integer('group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kmeans');
    }
}
