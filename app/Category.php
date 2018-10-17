<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
	public function game() {
        return $this->hasMany(Game::class); // this matches the Eloquent model
    }
}
