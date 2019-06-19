<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsCat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_cat', function(Blueprint $table)
        {
            $table->increments('id');
//            $table->integer('parent_id')->unsigned()->nullable();
//            $table->foreign('parent_id')->references('id')->on('product_cat')->onDelete('SET NULL');
            $table->string('title');
            $table->longText('options');
            $table->integer('grade');
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
