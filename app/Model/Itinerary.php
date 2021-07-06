<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //
    protected $fillable = [
           
        'mem_id',
        'itinerary_type',
        'start_time',
        'end_time',
        'duty',
        'store_name',
        'store_shortname',
        'store_id',
        
    ];
    
     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between itinerary table and member table |
     |___________________________________________________________________________|
     */

     public function member() {
     	return $this->belongsTo('App\Model\Member');
     }

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between itinerary table and paticipator  |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

     public function paticipator() {
        return $this->hasMany('App\Model\Paticipator');
     }
     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between action_plan table and itinerary|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public funtion action_plan() {
        return $this->hasOne('App\Model\Action_plan');
    }

     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between action_plan table and itinerary|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public funtion communiction() {
        return $this->hasOne('App\Model\Communication');
    }

}
