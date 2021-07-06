<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
     protected $fillable = [

        'business_id',
        'parenttype_id',
        'business_name',
        'crud',
        'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofbusiness table and business table  |
   |___________________________________________________________________________|
   */
    public function shopofbusiness()
    {
    	return $this->belongsTo('App\Model\Shopofbusiness');
    }
  
}
