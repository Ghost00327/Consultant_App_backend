<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [

        'st_id',            
        'name',
        'gender',
        'uid',
        'learn_identity',
        'position',
        'mobile',
        'entry_date',
        'duty_status',
        'other',
        
    ];

     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and employee tabl|
     |  e.                                                                       |
     |___________________________________________________________________________|
     */
    
    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }

}
