<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SWOT_analyze extends Model
{
    //
    protected $fillable = [

        'st_id',
        'advantage',
        'disadvantage',
        'external_choice',
        'external_danger',
        'remark',
    ]

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and SWOT_anaylyze|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public funtion storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
