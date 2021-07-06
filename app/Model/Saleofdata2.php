<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Saleofdata2 extends Model
{
    //
     //
     //
     protected $fillable = [
      
      'sale2_id',
      'shopbi_id',
      'category_name',
      'product_brand',
      'size',
      'salevalue',      
      'sindex',
      'crud',
      'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbi table and saleofdata2 table  |
   |___________________________________________________________________________|
   */
    public function shopofbi()
    {
    	return $this->hasOne('App\Model\Shopofbi');
    }
}
