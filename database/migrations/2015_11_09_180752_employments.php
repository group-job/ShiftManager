<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employments', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('group_id');
        $table->date('start_date');
        $table->date('end_date');
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
        Schema::drop('employments');
    }
}
