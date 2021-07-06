<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopofuser extends Model
{
    //
    //
     protected $fillable = [

        'shopofuser_id',        
        'user_id',
      	'sid',         
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
    	return $this->hasMany('App\Model\Shopofinfo');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between user table and shopofuser table  |
   |___________________________________________________________________________|
   */
    public function users()
    {
    	return $this->hasMany('App\Model\User');
    }
}
