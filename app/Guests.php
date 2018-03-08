<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guests extends Model
{
	use SoftDeletes;
	
	protected $fillable = ['rsvp', 'responded', 'email'];	

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
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
