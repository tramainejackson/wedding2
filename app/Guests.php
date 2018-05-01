<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
	
	protected $fillable = ['rsvp', 'responded', 'email'];	
	
	/**
		Get the person's plus one
	*/
    public function plusOne() {
		return $this->hasOne(AddtGuest::class);
	}
	
	public function addPlusOne($name, $rsvp) {
		$this->plusOne()->create(compact(['name', 'rsvp']));
	}
	
	/**
		Get the person's food selection
	*/
    public function food_option() {
		return $this->hasOne('\App\FoodSelection');
	}
}
