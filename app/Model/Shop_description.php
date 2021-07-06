<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_description extends Model
{
    //
     protected $fillable = [

        'shop_description_id',        
        'sid',
      	'shopface_url',
        'open_time',
        'decoration_time',
        'shopruntime',
        'DMS_time',
      	'fax', 
      	'am', 
      	'zip_code', 
      	'shopkeeper',
      	'shopkeeper_tel', 
      	'shopkeeper_email', 
      	'company_phone', 
        'worker_num',
        'station_num',
      	'shop_area', 
      	'operation_area', 
      	'rest_area', 
        'washcar_num',
        'lift_num',
      	'toilet', 
      	'init_cost', 
      	'decoration_cost', 
      	'device_cost', 
      	'league_cost', 
      	'stock_cost', 
      	'payrent', 
      	'bankliquidity', 
      	'otherinvestment',      
        'crud',
        'dateover'

    ];

     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofinfo table and shop_description table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasOne('App\Model\Shopofinfo');
    }
}
