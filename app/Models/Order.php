<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Order->User Relationship
    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
