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
                $table->string('phone_number')->default('-');
                $table->double('gpa', 3, 2);
                $table->char('mark', 2)->default('-');
                $table->boolean('is_experienced')->default(false);
                $table->boolean('is_order_certificate')->default(false);
                $table->boolean('is_certificate_printed')->default(false);
                $table->boolean('status')->default(false);
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
