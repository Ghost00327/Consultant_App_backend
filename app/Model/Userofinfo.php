<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userofinfo extends Model
{
    //
    protected $fillable = [

      'userofinfo_id',
      'user_id',
      'telephone', 
      'email',
    	'description', 
    	'headimgurl', 
    	'sex',
    	'company',
    	'department',
    	'position',
    	'address',
    	'birthdate',
    	'birthplace', 
    	'nation',
    	'id_card',
    	'ismarry',
    	'graduate_date',
    	'entry_date',
    	'emergent_phone',
    	'crud',
      'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between user table and userofinfo table  |
   |___________________________________________________________________________|
   */
    public function users()
    {
    	return $this->belongsTo('App\Model\User');
    }

}
