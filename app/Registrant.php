<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
	protected $table = 'registrants';
	protected $fillable = ['nrp', 'name', 'gpa', 'mark'];

	public function classroom() {
		return $this->belongsTo('App\ClassRoom', 'classroom_id', 'id');
	}
}
