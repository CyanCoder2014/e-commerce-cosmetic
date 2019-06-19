<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status');
            $table->integer('shipping_id')->unsigned()->nullable();
            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('set null');
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')
                ->references('id')->on('invoice')
                ->onDelete('cascade');
            $table->text('items');
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
        Schema::dropIfExists('loadings');
    }
}
