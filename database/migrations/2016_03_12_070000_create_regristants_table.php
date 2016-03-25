<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegristantsTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('registrants'))){
            Schema::create('registrants', function (Blueprint $table) {
                $table->increments('id');
                $table->string('NRP');
                $table->string('name');
                $table->integer('gpa');
                $table->string('mark');
                $table->integer('classroom_id')->unsigned();
                $table->foreign('classroom_id')->references('id')->on('classrooms');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::drop('registrants');
    }
}
