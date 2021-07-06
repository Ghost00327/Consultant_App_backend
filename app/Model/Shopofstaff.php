<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopofstaff extends Model
{
    //
     protected $fillable = [

        'shopofstaff_id',        
        'sid',
      	'staff_name', 
        'employ_state',
        'sex',
        'card_id',
        'learn_identity',
        'position',
        'telephone',
        'entry_date',
        'education',
        'head_url',
        'description',   
        'crud',
        'dateover'

    ];

    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofstaff table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasOne('App\Model\Shopofinfo');
    }
}
