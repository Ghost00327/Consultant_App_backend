<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Readofinfo extends Model
{
    //
    protected $fillable = [

    	'readinfo_id',
    	'infocenter_id',
    	'user_id',
    	'crud',
    	'dateover',

    ];



   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between infocenter table and readofinfo table  |
   |___________________________________________________________________________|
   */
    public function infocenter()
    {
    	return $this->hasOne('App\Model\Infocenter');
    }
}
