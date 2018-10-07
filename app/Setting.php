<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Setting extends Model
{
    /**
     *	Get the rsvp date attribute
     */
    public function getRsvpDateAttribute($value) {
        $rsvp_date = new Carbon($value);

        return $rsvp_date;
    }

    /**
	 *	Get the wedding date attribute
	*/
    public function getWeddingDateAttribute($value) {
		$wedding_date = new Carbon($value);

		return $wedding_date;
	}

	/**
     *	Get the rsvp date attribute
     */
    public function getHernameAttribute($value) {
        return ucfirst($value);
    }

    /**
	 *	Get the wedding date attribute
	*/
    public function getHisnameAttribute($value) {
        return ucfirst($value);
	}
}
