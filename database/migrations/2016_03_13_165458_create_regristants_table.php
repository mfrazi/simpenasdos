<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegristantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('registrants'))){
            Schema::create('registrants', function (Blueprint $table) {
                $table->increments('id');
                $table->string('NRP');
                $table->string('name');
                $table->integer('gpa');
                $table->string('mark');
                $table->integer('class_id')->unsigned();
                $table->foreign('class_id')->references('id')->on('classes');
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
