<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table)  {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pc_id')->nullable();
            $table->unsignedInteger('pd_id')->nullable();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('collection_id');
            $table->string('name');
            $table->string('reference')->nullable();
            $table->string('size')->nullable();
            $table->smallInteger('usage');
            $table->smallInteger('motor');
            $table->string('frame')->nullable();
            $table->string('kind')->nullable();
            $table->string('wristlet')->nullable();
            $table->string('lock')->nullable();
            $table->string('glass')->nullable();
            $table->string('face')->nullable();
            $table->boolean('accessories');
            $table->string('tools');
            $table->string('parts');
            $table->string('keeping');
            $table->text('complexity');
            $table->string('sex');
            $table->text('material')->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('price');
            $table->text('description');
            $table->boolean('waterproof');
            $table->boolean('active');
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
