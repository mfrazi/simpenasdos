<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
	protected $fillable = ['name'];

	public function course() {
		return $this->belongsTo('App\Course', 'course_id', 'id');
	}
    public function classuser() {
		return $this->hasMany('App\Classuser', 'classroom_id', 'id');
	}
	public function registrant() {
	    return $this->hasMany('App\Registrant', 'classroom_id', 'id');
    }
}
