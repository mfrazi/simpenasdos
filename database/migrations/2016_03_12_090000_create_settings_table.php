<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('settings'))){
            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('semester_id')->unsigned();
                $table->foreign('semester_id')->references('id')->on('semesters');
                $table->boolean('status_pendaftaran')->default(0);
                $table->boolean('status_pengumuman')->default(0);
                $table->boolean('status_kaprodi')->default(0);
            });
        }
    }

    public function down()
    {
        Schema::drop('settings');
    }
}
