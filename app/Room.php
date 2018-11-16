<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function event() {
        return $this->belongsTo('Laravel\Event');
    }
}
