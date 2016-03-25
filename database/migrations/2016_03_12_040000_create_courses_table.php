<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatkulsTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('courses'))){
            Schema::create('courses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
            });
        }
    }

    public function down()
    {
        Schema::drop('courses');
    }
}
