<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Maoliofdata extends Model
{
    //
    protected $fillable = [
      
      	'maoli_id',
      	'shopbi_id',
      	'category_name',
      	'last_maoli',
      	'target_maoli',
      	'cutoff_maoli',
      	'cutoff_price',
        'mindex',
      	'crud',
      	'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbi table and maoliofdata table  |
   |___________________________________________________________________________|
   */
    public function shopofbi()
    {
    	return $this->hasOne('App\Model\Shopofbi');
    }
}
