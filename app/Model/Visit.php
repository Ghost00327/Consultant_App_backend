<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //
    //
     protected $fillable = [
      
        'visit_id',
        'plan_id',
        'arrive_time', 
        'leave_time', 
        'arrive_position', 
        'leave_position', 
        'lunch_time',
        'observed_time',
        'review_time',
        'actionplan_time',
        'train_time',
        'communication_time',
        'summary_time',
        'visittarget', 
        'visitplan', 
      	'crud',
      	'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between plan table and visit table  |
   |___________________________________________________________________________|
   */
    public function plan()
    {
    	return $this->hasMany('App\Model\Plan');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and datareport table  |
   |___________________________________________________________________________|
   */
    public function datareport()
    {
    	return $this->belongsTo('App\Model\Datareport');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and summarymeeting table  |
   |___________________________________________________________________________|
   */
    public function summarymeeting()
    {
    	return $this->belongsTo('App\Model\Summarymeeting');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and shopoftrain table  |
   |___________________________________________________________________________|
   */
    public function shopoftrain()
    {
    	return $this->belongsTo('App\Model\Shopoftrain');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and actionofplan table  |
   |___________________________________________________________________________|
   */
    public function actionofplan()
    {
    	return $this->belongsTo('App\Model\Actionofplan');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and communication table  |
   |___________________________________________________________________________|
   */
    public function communication()
    {
    	return $this->belongsTo('App\Model\Communication');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and sopofresult table  |
   |___________________________________________________________________________|
   */
    public function sopofresult()
    {
    	return $this->belongsTo('App\Model\Sopofresult');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and sopofreason table  |
   |___________________________________________________________________________|
   */
    public function sopofreason()
    {
    	return $this->belongsTo('App\Model\Sopofreason');
    }
}
