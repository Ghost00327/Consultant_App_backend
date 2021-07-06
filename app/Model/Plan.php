<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
     //
    protected $table = 'plans';
    protected $fillable = [

    	'plan_id',
    	'plantype_id',
    	'sid',
    	'user_id',
    	'start_date',
    	'end_date',
    	'start_time',
    	'end_time',
    	'isdone',
    	'togethercall',    	
    	'crud',
    	'dateover',

    ];



   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between plan table and plantype table    |
   |___________________________________________________________________________|
   */
    public function plantype()
    {
    	return $this->hasMany('App\Model\Plantype');
    }
     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between plan table and shopofinfo table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasMany('App\Model\Shopofinfo');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between plan table and user table  |
   |___________________________________________________________________________|
   */
    public function user()
    {
    	return $this->hasMany('App\Model\User');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between plan table and visit table  |
   |___________________________________________________________________________|
   */
    public function users()
    {
    	return $this->belongsTo('App\Model\Visit');
    }
}
