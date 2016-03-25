<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestersTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('semesters'))){
            Schema::create('semesters', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('year')->unsigned();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::drop('semesters');
    }
}
