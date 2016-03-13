<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'class_room';
	protected $fillable = ['name'];
	public function users() {
		return $this->belongsToMany('App\User', 'user_id', 'id');
	}
}
