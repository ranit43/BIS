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
            //$table->string('user_name')->unique();
            $table->string('image');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->string('adress')->nullable();
            $table->string('role')->nullable();
            //-----------------$table->string('role');
            //$table->string('achievement');
            $table->string('CV')->nullable();
            //-----------------$table->string('skill');
            //-----------------$table->string('volunteering_skill');
            $table->string('password');
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
