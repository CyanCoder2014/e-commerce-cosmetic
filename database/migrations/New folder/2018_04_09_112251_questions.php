<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('question_cat')->onDelete('CASCADE');
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('test')->onDelete('CASCADE');
            $table->string('title');
            $table->text('content');
            $table->longText('options');
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
        //
    }
}
