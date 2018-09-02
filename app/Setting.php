<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Setting extends Model
{
    /**
	 *	Get the person's plus one
	*/
    public function getWeddingDateAttribute($value) {
		$wedding_date = new Carbon($value);
		
		return $this->attributes['wedding_date'] = $wedding_date;
	}
}
