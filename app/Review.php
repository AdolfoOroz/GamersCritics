<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
	public function user() {
        return $this->belongsTo(User::class);
    }
	
	public function game() {
        return $this->belongsTo(Games::class);
    }
	
	public function review_images() {
        return $this->hasMany(Images::class); // this matches the Eloquent model
    }
		
	public function review_rating() {
        return $this->hasMany(Rating::class); // this matches the Eloquent model
    }
	
	public function review_videos() {
        return $this->hasMany(Videos::class); // this matches the Eloquent model
    }	
	
	public function review_comments() {
        return $this->hasMany(Comment::class); // this matches the Eloquent model
    }
}
