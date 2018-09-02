<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
	
	protected $fillable = ['rsvp', 'responded', 'email'];	
	
	/**
		Get the person's plus one
	*/
    public function getNameAttribute($value) {
		return $this->attributes['name'] = ucwords($value);
	}
	
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
	
	/**
		Get all the confirmed rsvp's
	*/
    public function scopeConfirmed($query) {

		return $query->where('rsvp', 'Y');
	}
	
	/**
		Get all the declined rsvp's
	*/
    public function scopeDeclined($query) {

		return $query->where('rsvp', 'N');
	}
	
	/**
		Get all the declined rsvp's
	*/
    public function scopeNotResponed($query) {

		return $query->where('rsvp', null);
	}
}
