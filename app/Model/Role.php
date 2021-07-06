<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
      'role_id',
      'role_name',
      'parent_id',
      'crud'
    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between user table and role table        |
   |___________________________________________________________________________|
   */
    public function users()
    {
    	return $this->belongsTo('App\Model\User');
    }

}
