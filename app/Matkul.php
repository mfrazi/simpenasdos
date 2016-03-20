<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'matkuls';

    public function classroom() {
		return $this->hasMany('App\ClassRoom', 'matkul_id', 'id');
	}
}
