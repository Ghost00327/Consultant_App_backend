<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Storedescription extends Model
{
    //
    protected $fillable = [

       'st_id',
       'total_area',
       'work_area',
       'rest_area',
       'member_num',
       'lift_num',
       'carcleanroom_num',
       'toilet',
       
    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and storedescript|
     |  ion  table.                                                              |
     |___________________________________________________________________________|
     */

    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
