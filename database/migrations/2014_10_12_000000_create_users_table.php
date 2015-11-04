<?php

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
<<<<<<< HEAD
            $table->string('name');
            $table->integer('phone1',4);
            $table->integer('phone2',4);
            $table->integer('phone3',4);
            $table->string('email')->unique();
            $table->string('password', 60);
=======
            $table->string('name',25);
            $table->string('email',30)->unique();
            $table->string('phone',11)->unique();
            $table->string('password', 16);
>>>>>>> origin/master
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
        Schema::drop('users');
    }
}
