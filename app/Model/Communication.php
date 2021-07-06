<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    //
     protected $fillable = [

    	'communication_id',
    	'visit_id',
    	'people', 
        'content',
        'result', 
        'comments', 
        'communication_time',
        'image1', 
        'image2', 
        'image3', 
        'image4', 
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and communication table  |
   |___________________________________________________________________________|
   */
    public function visit()
    {
    	return $this->hasMany('App\Model\Visit');
    }
}
