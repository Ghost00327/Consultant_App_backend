<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopoftrain extends Model
{
    //
     protected $fillable = [

    	'train_id',
    	'visit_id',
    	'train_people', 
        'train_content',
        'train_date',          
        'train_result',           
        'image1', 
        'image2', 
        'image3', 
        'image4', 
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
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between trainofitem table and shopoftrain table  |
   |___________________________________________________________________________|
   */
    public function trainofitem()
    {
    	return $this->belongsTo('App\Model\Trainofitem');
    }
}
