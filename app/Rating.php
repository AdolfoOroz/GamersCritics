<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
	public function User_Rates() {
        return $this->belongsTo(User::class);
    }
	public function Review_Rated() {
        return $this->belongsTo(Review::class);
    }
}
