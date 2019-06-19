<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('role_user', function (Blueprint $table)  {
        //     $table->unsignedInteger('role_id');

        //     $table->unsignedInteger('user_id');


        //     $table->foreign('role_id')
        //         ->references('id')
        //         ->on('roles')
        //         ->onDelete('cascade');
        //     $table->foreign('user_id')
        //         ->references('id')
        //         ->on('users')
        //         ->onDelete('cascade');

        //     $table->primary(['role_id', 'user_id'],
        //         'model_has_roles_role_model_type_primary');
        // });
//        Schema::table('role_user', function (Blueprint $table)  {
////            $table->unsignedInteger('role_id');
////
////            $table->unsignedInteger('user_id');
////
////
////            $table->foreign('role_id')
////                ->references('id')
////                ->on('roles')
////                ->onDelete('cascade');
////            $table->foreign('user_id')
////                ->references('id')
////                ->on('users')
////                ->onDelete('cascade');
//
//            $table->primary(['role_id', 'user_id'],
//                'model_has_roles_role_model_type_primary');
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
