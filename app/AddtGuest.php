<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddtGuest extends Model
{
	use SoftDeletes;
	
	/**
	 * The attributes that are mass assignable
	 *
	 * @var array
	*/
	protected $fillable = ['guests_id', 'name', 'rsvp'];
	
    /**
		Get the person who was invited
	*/	
	public function guests() {
		return $this->belongsTo('\App\Guests');
	}
}
