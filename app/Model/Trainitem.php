<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trainitem extends Model
{
    //
    protected $fillable = [

    	'trainitem_id',
    	'train_item',
    	'crud',
    	'dateover'
    ];

    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between trainitem table and trainofitem table  |
   |___________________________________________________________________________|
   */
    public function trainofitem()
    {
    	return $this->belongsTo('App\Model\Trainofitem');
    }
}
