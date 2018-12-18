<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
        'title','start_date','end_date','name','describe','start_time','end_time',
    ];


/*     public function room()
    {
        return $this->hasOne('App\Room');
    } */
}
