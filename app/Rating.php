<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
	public function user() {
        return $this->belongsTo(User::class);
    }
	public function review() {
        return $this->belongsTo(Review::class);
    }
}
