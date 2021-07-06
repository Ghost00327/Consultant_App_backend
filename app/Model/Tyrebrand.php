<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tyrebrand extends Model
{
    //
    protected $fillable = [

    	'tyrebrand_id',
    	'brand_code',
    	'brand_name',    	    
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyrestore2 table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyrestore2()
    {
    	return $this->belongsTo('App\Model\Tyrestore2');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyreorder table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyreorder()
    {
    	return $this->belongsTo('App\Model\Tyreorder');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyresale()
    {
    	return $this->belongsTo('App\Model\Tyresale');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and tyrebrand table  |
   |___________________________________________________________________________|
   */
    public function tyrestore()
    {
    	return $this->belongsTo('App\Model\Tyrestore');
    }
}
