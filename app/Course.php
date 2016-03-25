<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function classroom() {
		return $this->hasMany('App\ClassRoom', 'course_id', 'id');
	}
}
