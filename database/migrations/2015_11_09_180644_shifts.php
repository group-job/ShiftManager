<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('shifts', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('group_id');
        $table->date('date');
        $table->time('start_time');
        $table->time('end_time');
        $table->integer('status');
        $table->string('note');
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
        Schema::drop('shifts');
    }
}
