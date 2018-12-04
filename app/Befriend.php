<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Befriend extends Model
{
    //
	public function userbefriend() {
        return $this->belongsTo(User::class);
    }
	
	public function user() {
        return $this->belongsTo(User::class);
    }
}
