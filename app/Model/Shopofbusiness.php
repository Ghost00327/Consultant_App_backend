<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopofbusiness extends Model
{
    //
     protected $fillable = [

        'bs_id',
        'business_id',
        'sid',
        'month',
        'business_name',      
        'crud',
        'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between business table and shopofbusiness table  |
   |___________________________________________________________________________|
   */
    public function business()
    {
    	return $this->belongsToMany('App\Model\Business');
    }
     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofinfo table and shopofbusiness table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasOne('App\Model\Shopofinfo');
    }
}
