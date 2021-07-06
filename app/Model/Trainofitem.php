<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trainofitem extends Model
{
    //
    protected $fillable = [

        'trainofitem_id',
    	'trainitem_id',
    	'train_id',
    	'crud',
    	'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between trainitem table and trainofitem table  |
   |___________________________________________________________________________|
   */
    public function trainitem()
    {
    	return $this->hasMany('App\Model\Trainitem');
    }

    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopoftrain table and trainofitem table  |
   |___________________________________________________________________________|
   */
    public function shopoftrain()
    {
    	return $this->hasMany('App\Model\Shopoftrain');
    }
}
