<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
//            $table->foreign('parent_id')->references('id')->on('product_detail_group')->onDelete('cascade');
            $table->string('name');
            $table->integer('price');
            $table->integer('discount');
            $table->string('type');
            $table->integer('pc_id');
            $table->integer('pd_id');
            $table->string('file');
            $table->integer('brand_id');
            $table->string('availablity');
            $table->text('image');
            $table->text('description');
            $table->timestamps();
            $table->text('details');
            $table->integer('state');
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
