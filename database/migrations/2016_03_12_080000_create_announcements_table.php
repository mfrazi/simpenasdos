<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('announcements'))){
            Schema::create('announcements', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->longText('content');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::drop('announcements');
    }
}
