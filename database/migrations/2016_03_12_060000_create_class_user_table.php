<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUserTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('class_user'))){
            Schema::create('class_user', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('classroom_id')->unsigned();
                $table->foreign('classroom_id')->references('id')->on('classrooms');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::drop('class_user');
    }
}
