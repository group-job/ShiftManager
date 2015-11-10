<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rates', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('group_id');
        $table->integer('rate');
        $table->date('start_date');
        $table->date('end_date');
        $table->integer('rate_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rates');
    }
}
