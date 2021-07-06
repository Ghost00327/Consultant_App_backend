<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imagereference extends Model
{
    //
     protected $fillable = [

    	'imagereference_id',
    	'imageitem_id', 
        'sopitem_id',         
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between sopitem table and imagereference table  |
   |___________________________________________________________________________|
   */
    public function sopitems()
    {
    	return $this->hasMany('App\Model\Sopitem');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between imageitem table and imagereference table  |
   |___________________________________________________________________________|
   */
    public function imageitems()
    {
    	return $this->hasMany('App\Model\Imageitem');
    }
}
