<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Paticipator extends Model
{
    //
    protected $fillable = [

        'itinerary_id',
        'paticipator',
        
    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between itinerray table and paticipator  |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function itinerary() {
     	return $this->belongsTo('App\Model\Itinerary');
     }
}
