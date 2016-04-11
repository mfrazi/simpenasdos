<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
	protected $table = 'registrants';
	protected $fillable = ['nrp', 'name', 'gpa', 'mark', 'phone_number', 'is_experienced', 'is_order_certificate', 'is_certificate_printed'];

	public function classroom() {
		return $this->belongsTo('App\ClassRoom', 'classroom_id', 'id');
	}
}
