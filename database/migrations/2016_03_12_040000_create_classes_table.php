<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('classrooms'))){
            Schema::create('classrooms', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('course_id')->unsigned();
                $table->foreign('course_id')->references('id')->on('courses');
                $table->integer('semester_id')->unsigned();
                $table->foreign('semester_id')->references('id')->on('semesters');
                $table->timestamps();
            });
        }
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
