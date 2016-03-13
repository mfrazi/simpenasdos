<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['nama', 'NIP', 'username'];
    protected $hidden = ['password', 'remember_token'];

    public function role()
	{
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}

	public function class_rooms() {
		return $this->belongsToMany('App\ClassRoom', 'class_room_id', 'id');
	}

	public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();
		// Check if the user is a root account
		if($this->have_role->type == 'superuser') {
			return true;
		}
		if(is_array($roles)){
			foreach($roles as $need_role){
				if($this->checkIfUserHasRole($need_role)) {
					return true;
				}
			}
		} else{
			return $this->checkIfUserHasRole($roles);
		}
		return false;
	}
	private function getUserRole()
	{
		return $this->role()->getResults();
	}
	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role)==strtolower($this->have_role->type)) ? true : false;
	}
}
