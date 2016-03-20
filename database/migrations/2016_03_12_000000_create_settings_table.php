<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('settings'))){
            Schema::create('settings', function (Blueprint $table) {
                $table->datetime('akhirsemester');
                $table->boolean('status_pendaftaran');
                $table->integer('tahun_pelajaran');
                $table->tinyInteger('semester');
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
        Schema::drop('settings');
    }
}
