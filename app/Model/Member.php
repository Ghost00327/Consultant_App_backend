<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [   

        'mem_id',        
        'photo_url',
        'name',
        'gender',
        'company',
        'department',
        'position',
        'job_num',
        'tele_num',
        'email',
        'region',
        'birthday',
        'nativeplace',
        'nation',
        'IDnumber',
        'maritalstatus',
        'child',
        'address',
        'emergency_contact',
        'entrydate',
        'graduationdate',
        
    ];
    
    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between member table and user table      |
     |___________________________________________________________________________|
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between itinerary table and member table |
     |___________________________________________________________________________|
     */
    public function itinerary () 
    {
        return $this->hasMany('App\Model\Itinerary');

    }
 
}
