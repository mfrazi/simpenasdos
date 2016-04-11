<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
	protected $fillable = ['semester_id', 'status_pendaftaran', 'status_pengumuman', 'status_kaprodi'];
    public $timestamps = false;

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'semester_id', 'id');
    }
}
