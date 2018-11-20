<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BridalParty extends Model
{
    /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
    */

    public function scopeTotalCouples($query)
    {
        return $query->max('order') + 1;
    }

    public function scopeGetBridalOrder($query, $order)
    {
        return $query->where('order', $order)->get();
    }
}
