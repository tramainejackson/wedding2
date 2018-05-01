<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddtGuest extends Model
{
	/**
	 * The attributes that are mass assignable
	 *
	 * @var array
	*/
	protected $fillable = ['guests_id', 'name', 'rsvp', 'added_by'];
	
    /**
		Get the person who was invited
	*/	
	public function guests() {
		return $this->belongsTo('\App\Guests');
	}
}
