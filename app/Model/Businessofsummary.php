<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Businessofsummary extends Model
{
    //
      protected $fillable = [
      
      	'bs_id',
      	'shopbi_id',
      	'category_name',
      	'last_turnover', 
        'target_turnover', 
        'cutoff_turnover', 
        'turnover_rate', 
        'turnover_finished_rate', 
        'by_turnover_forecast', 
        'station_turnover', 
        'last_maoli', 
        'target_maoli', 
        'cutoff_maoli', 
        'maoli_rate', 
        'maoli_finished_rate', 
        'by_maoli_forecast', 
        'retail_turnover', 
        'station_maoli', 
        'car_traffic',
        'repair_traffic',
        'bindex',
      	'crud',
      	'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbi table and businessofsummary table  |
   |___________________________________________________________________________|
   */
    public function shopofbi()
    {
    	return $this->hasOne('App\Model\Shopofbi');
    }
}
