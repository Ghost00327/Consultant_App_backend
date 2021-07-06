<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sopitem extends Model
{

    //
     protected $fillable = [

    	'sopitem_id',
    	'group', 
        'category', 
        'range', 
        'sop_item', 
        'sop_detail', 
        'sop_method1', 
        'sop_method2', 
        'type1',
        'type2',
        'type3',
        'standard_score',
        'level',
        'item_num',            
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between sopitem table and imagereference table  |
   |___________________________________________________________________________|
   */
    public function imagereference()
    {
    	return $this->belongsTo('App\Model\Imagereference');
    }
}
