<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_picture','background_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
	
	public function review() {
        return $this->hasMany(Review::class); // this matches the Eloquent model
    }
	
	public function UserBefriends() {
        return $this->belongsToMany(User::class);
    }
	
	public function UserRecommends() {
        return $this->belongsToMany(User::class);
    }
	
	public function UserComments() {
        return $this->hasMany(Comment::class); // this matches the Eloquent model
    }
	
	public function authorizeRoles($roles){
	if (is_array($roles)) {
		return $this->hasAnyRole($roles) || 
		  abort(401, 'Acceso no autorizado.');
	  }
	  return $this->hasRole($roles) || 
		abort(401, 'Acceso no autorizado.');
	}

	public function hasAnyRole($roles){
	  return null !== $this->roles()
		->whereIn('name', $roles)->first();
	}

	public function hasRole($role){
	  return null !== $this->roles()
		->where('name', $role)->first();
	}
}
