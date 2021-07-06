<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Summarymeeting extends Model
{
    //
    protected $fillable = [

    	'summarymeeting_id',
    	'visit_id',
    	'meeting_target',
        'meeting_subject',
        'meeting_people', 
        'meeting_time',
        'effect', 
        'comments',
        'image1', 
        'image2', 
        'image3', 
        'image4',  	    
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and summarymeeting table  |
   |___________________________________________________________________________|
   */
    public function visit()
    {
    	return $this->hasMany('App\Model\Visit');
    }
   
}
