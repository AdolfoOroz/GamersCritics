<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    //
	public function review() {
        return $this->hasMany(Review::class); // this matches the Eloquent model
    }
	
	public function category() {
        return $this->belongsTo(Category::class);
    }
}
