<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Saleofdata extends Model
{
    //
     //
     protected $fillable = [
      
      'sale_id',
      'shopbi_id',
      'category_name',
      'last_sale',
      'sale_rate',
      'target_sale',
      'cutoff_sale',      
      'target_finished_rate',
      'cross_rate',
      'storage',
      'sindex',
      'crud',
      'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbi table and saleofdata table  |
   |___________________________________________________________________________|
   */
    public function shopofbi()
    {
    	return $this->hasOne('App\Model\Shopofbi');
    }
}
