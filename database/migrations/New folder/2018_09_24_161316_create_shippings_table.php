<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('unit_price_weight');
            $table->integer('base_price');
            $table->timestamps();
        });
        Schema::create('shipping_size', function (Blueprint $table) {
            $table->integer('price');
            $table->integer('from_length')->unsigned()->nullable();
            $table->integer('to_length')->unsigned()->nullable();
            $table->integer('from_width')->unsigned()->nullable();
            $table->integer('to_width')->unsigned()->nullable();
            $table->integer('from_height')->unsigned()->nullable();
            $table->integer('to_height')->unsigned()->nullable();
            $table->integer('shipping_id')->unsigned();
            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('cascade');
        });
        Schema::create('shipping_province', function (Blueprint $table) {
            $table->integer('province_id')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->foreign('province_id')
                ->references('id')->on('province')
                ->onDelete('cascade');
            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('cascade');
        });
        Schema::create('shipping_product', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');
            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
        Schema::dropIfExists('shipping_size');
        Schema::dropIfExists('shipping_province');
        Schema::dropIfExists('shipping_product');
    }
}
