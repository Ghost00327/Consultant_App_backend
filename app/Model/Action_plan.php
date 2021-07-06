<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Action_plan extends Model
{
    //
    protected $filable = [

        'itineray_id',
        'problem',
        'action_target',
        'action_plan',
        'executor',
        'set_time',
        'expected_time',
        'remark',
        'status',
        
    ];

     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between action_plan table and itinerary|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public funtion itinerary() {
    	return $this->belongsTo('App\Model\Itinerary');
    }
}
