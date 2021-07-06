<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Datareport extends Model
{
    //
    protected $fillable = [

    	'datareport_id',
    	'visit_id',
    	'user_id',
    	'datatype',
    	'report_date',
    	'comments',
    	'total_amount',        
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and datareport table  |
   |___________________________________________________________________________|
   */
    public function visits()
    {
    	return $this->hasMany('App\Model\Visit');
    }

    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyrestore2 table and datareport table  |
   |___________________________________________________________________________|
   */
    public function tyrestore2()
    {
    	return $this->belongsTo('App\Model\Tyrestore2');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyreorder table and datareport table  |
   |___________________________________________________________________________|
   */
    public function tyreorder()
    {
    	return $this->belongsTo('App\Model\Tyreorder');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and datareport table  |
   |___________________________________________________________________________|
   */
    public function tyresale()
    {
    	return $this->belongsTo('App\Model\Tyresale');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between tyresale table and datareport table  |
   |___________________________________________________________________________|
   */
    public function tyrestore()
    {
    	return $this->belongsTo('App\Model\Tyrestore');
    }
}
