<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
     protected $fillable = [

        'area_id',
        'parent_id',
        'code',
        'area_name',
        'level',
        'sort',
        'crud',
        'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofinfo table and area table  |
   |___________________________________________________________________________|
   */
    public function shopofinfo()
    {
    	return $this->belongsTo('App\Model\shopofinfo');
    }
}
