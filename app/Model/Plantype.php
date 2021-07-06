<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plantype extends Model
{
    //
    protected $fillable = [

    	'plantype_id',
    	'plantype_name',
    	'category',
    	'crud',
    	'dateover',

    ];



   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between plan table and plantype table  |
   |___________________________________________________________________________|
   */
    public function plan()
    {
    	return $this->belongsTo('App\Model\Plan');
    }
}
