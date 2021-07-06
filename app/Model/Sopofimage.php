<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sopofimage extends Model
{
    //
     protected $fillable = [

        'sopofimage_id',   
    	'imageitem_id',
    	'visit_id',
    	'photodate'
    	'imageurl',
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between imageitem table and sopofimage table  |
   |___________________________________________________________________________|
   */
    public function imageitem()
    {
    	return $this->hasMany('App\Model\Imageitem');
    }
}
