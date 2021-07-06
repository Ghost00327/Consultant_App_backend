<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tyrestore2 extends Model
{
    //
    protected $fillable = [

    	'tyrestore_id',
    	'datareport_id',
    	'tyrebrand_id',
    	'detail',    	    
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyrestore2 table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyrebrand()
    {
    	return $this->hasMany('App\Model\Tyrebrand');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyrestore2 table and datareport table  |
   |___________________________________________________________________________|
   */
    public function datareport()
    {
    	return $this->hasMany('App\Model\Datareport');
    }

}
