<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('roles'))){
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type')->unique();
            });
        }
    }

    public function down()
    {
        Schema::drop('roles');
    }
}
