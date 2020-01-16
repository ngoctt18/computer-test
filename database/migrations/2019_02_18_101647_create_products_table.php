<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->text('detail')->nullable();
            $table->text('feature')->nullable();
            $table->text('use')->nullable();
            $table->double('price');
            $table->text('image')->nullable();
            $table->double('price_new')->nullable();
            $table->integer('quantity');
            $table->integer('warranty');
            $table->string('color')->nullable();
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedInteger('catagory_id');
            $table->foreign('catagory_id')->references('id')->on('catagories');
            $table->integer('status')->nullable();
            $table->integer('year');
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
        Schema::dropIfExists('products');
    }
}
