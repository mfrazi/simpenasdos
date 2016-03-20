<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
	protected $fillable = ['name'];

	public function matkul() {
		return $this->belongsTo('App\Matkul', 'matkul_id', 'id');
	}
    public function classuser() {
		return $this->hasMany('App\Classuser', 'classroom_id', 'id');
	}
}
