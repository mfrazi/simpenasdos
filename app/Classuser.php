<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classuser extends Model
{
    protected $table = 'class_user';

    public function classroom() {
        return $this->belongsTo('App\Classroom', 'classroom_id', 'id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
