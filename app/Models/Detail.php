<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
	protected $fillable = ['addressline1', 'addressline2', 'city', 'state', 'zip', 'country', 'phone'];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
