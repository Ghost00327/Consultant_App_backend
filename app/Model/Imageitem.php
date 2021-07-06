<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imageitem extends Model
{
    //
    protected $fillable = [
    	'imageitem_id',
    	'itemname',
    	'crud',
    	'dateover',
    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between imageitem table and sopofimage table  |
   |___________________________________________________________________________|
   */
    public function sopofimage()
    {
    	return $this->belongsTo('App\Model\Sopofimage');
    }
}
