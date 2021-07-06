<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tradeofdata extends Model
{
    //
     protected $fillable = [
      
      'trade_id',
      'shopbi_id',
      'category_name',
      'last_trade',
      'target_trade',
      'cutoff_trade',
      'trade_rate',
      'target_finished_rate',
      'trade_yc',
      'SOB',
      'tindex',
      'crud',
      'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbi table and tradeofdata table  |
   |___________________________________________________________________________|
   */
    public function shopofbi()
    {
    	return $this->hasOne('App\Model\Shopofbi');
    }
}
