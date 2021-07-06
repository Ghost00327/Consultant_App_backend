<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actionofplan extends Model
{
    //
     protected $fillable = [

    	'actionofplan_id',
    	'visit_id',
    	'category',
        'issue', 
        'action_target',
        'action_program',
        'executor', 
        'develop_time',
        'plan_complete_time',
        'actual_complete_time',
        'iscomplete',
        'comments', 
        'filename', 
        'fileattach',
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and shopoftrain table  |
   |___________________________________________________________________________|
   */
    public function visit()
    {
    	return $this->hasMany('App\Model\Visit');
    }
}
