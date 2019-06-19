<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advertising extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table)  {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('collection_id');
            $table->unsignedInteger('product_id');
            $table->string('title');
            $table->string('reference');
            $table->string('serial');
            $table->string('email');
            $table->string('tell');
            $table->unsignedInteger('status');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->boolean('guarantee');
            $table->boolean('box');
            $table->boolean('active');

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
