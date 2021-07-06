<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = [

        'st_id',
        'tire_id',
        'tire_name',
        'inventory_amount',
        'reporter',
        'report_time',
        'remark',
        'photo_url',
        
    ];
    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and inventory    |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public funtion storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
