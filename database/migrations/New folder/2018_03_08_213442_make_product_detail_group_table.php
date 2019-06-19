<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProductDetailGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail_group', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('parent_id')->index()->unsigned();
            $table->foreign('parent_id')->references('id')->on('product_detail_group')->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('detail');
            $table->integer('state');
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
