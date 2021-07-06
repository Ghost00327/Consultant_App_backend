<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Initial_investment extends Model
{
    //
     protected $fillable = [
     
       'st_id',
       'init_amount',
       'decoration',
       'equipment',
       'stocking',
       'prepaid_rent',
       'bank_liquidity',
       'others',
       'initialcost',

    ];

     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and initial_inves|
     |  tment table.                                                             |
     |___________________________________________________________________________|
     */
    
    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
