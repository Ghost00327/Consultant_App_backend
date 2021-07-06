<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tyreorder extends Model
{
    //
    protected $fillable = [

    	'tyreorder_id',
    	'datareport_id',
    	'tyrebrand_id',
    	'ordernum',
    	'orderprice',
    	'order_total',    	    
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyreorder table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyrebrand()
    {
    	return $this->hasMany('App\Model\Tyrebrand');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyreorder table and datareport table  |
   |___________________________________________________________________________|
   */
    public function datareport()
    {
    	return $this->hasMany('App\Model\Datareport');
    }
}
