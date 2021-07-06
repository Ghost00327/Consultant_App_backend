<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tyresale extends Model
{
    //
    protected $fillable = [

    	'tyresale_id',
    	'datareport_id',
    	'tyrebrand_id',
    	'salenum',
    	'saleprice',    	  	    
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyrebrand()
    {
    	return $this->hasMany('App\Model\Tyrebrand');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and datareport table  |
   |___________________________________________________________________________|
   */
    public function datareport()
    {
    	return $this->hasMany('App\Model\Datareport');
    }
}
