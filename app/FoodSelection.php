<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodSelection extends Model
{
	/**
		Get the person who selected the food option
	*/
    public function guests() {
		return $this->belongsTo('App\Guests', 'guests_id');
	}
}
