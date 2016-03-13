<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classroom';
	protected $fillable = ['name'];
	public function users() {
		return $this->belongsToMany('App\User', 'user_id', 'id');
	}
}
