<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // User profile relationship
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
