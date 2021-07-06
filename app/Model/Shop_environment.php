<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_environment extends Model
{
    //
     //
     protected $fillable = [

        'shop_environment_id',        
        'sid',
      	'carbeauty_num',
        'car_quickrepair_num',
        'car4s_num',
        'car_repair_num',
        'gas_station_num',
        'supermarket_num',
        'tyreshop_num',   
        'crud',
        'dateover'

    ];

    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shop_environment table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasOne('App\Model\Shopofinfo');
    }
}
