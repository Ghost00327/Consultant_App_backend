<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tyrestore extends Model
{
    //
    protected $fillable = [

    	'tyrestore_id',
    	'datareport_id',
    	'tyrebrand_id',
    	'storenum',    	   	    
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
