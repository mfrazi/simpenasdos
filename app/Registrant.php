<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
	protected $table = 'registrants';
	protected $fillable = ['nrp', 'name', 'gpa', 'mark'];
	public function _class() {
		return $this->belongsTo('App\ClassRoom', 'class_room_id', 'id');
	}
}
