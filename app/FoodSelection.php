<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodSelection extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
	
	/**
		Get the person who selected the food option
	*/
    public function guest() {
		return $this->belongsTo('App\Guests');
	}
}
