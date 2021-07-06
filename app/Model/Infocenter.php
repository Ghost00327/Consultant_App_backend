<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Infocenter extends Model
{
    //
    protected $fillable = [

       'infocenter_id',
       'user_id',
       'content',
       'crud',
       'dateover',
    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between infocenter table and readofinfo table  |
   |___________________________________________________________________________|
   */
    public function readofinfo()
    {
    	return $this->belongsTo('App\Model\Readofinfo');
    }
}
