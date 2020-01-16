<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('phone');
            $table->string('rule')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
