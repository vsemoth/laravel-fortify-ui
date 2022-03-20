<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
	// Define table
    protected $guarded = [];

    // Define Category - Screenshot relationship
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
