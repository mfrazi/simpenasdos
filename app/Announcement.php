<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
	use SoftDeletes;

	protected $table = 'announcements';
	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'content'];

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
