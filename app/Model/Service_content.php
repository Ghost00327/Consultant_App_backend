<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service_content extends Model
{
    //
     protected $fillable = [
     
        'st_id',
        'engine_oil',
        'brake',
        'battery',
        'sparkplug',
        'lightbulb',
        'filter',
        'carcleancard',
        'manualcarclean',
        'decoration',
        'autoclean',
        'waxing',
        'polishing',
        'protectionfilm',
        'seatcover',
        'tire',
        'wheelalgin',
        'valve',
        'ballence',
        'insurance',
        'glass',
        'motor',
        'wiper',
        'other',     

    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and service_conte|
     |  nt table.                                                                |
     |___________________________________________________________________________|
     */

    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
