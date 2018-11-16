<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
        'title','start_date','end_date','name','describe','start_time','end_time',
    ];

    protected $casts = [
        'start_date'  => 'date:Y-m-D',
        'end_date' => 'date:Y-F-d',
        /* 'start_time' => 'date:H-i', */
    ];

/*     public function room()
    {
        return $this->hasOne('App\Room');
    } */
}
