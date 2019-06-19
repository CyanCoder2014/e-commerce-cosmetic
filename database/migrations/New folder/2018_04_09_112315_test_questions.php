<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('test_questions', function(Blueprint $table)
//        {
//            $table->increments('id');
//            $table->integer('test_id')->unsigned();
//            $table->foreign('test_id')->references('id')->on('test')->onDelete('CASCADE');
//            $table->integer('q_id')->unsigned();
//            $table->foreign('Q_id')->references('id')->on('questions')->onDelete('CASCADE');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
