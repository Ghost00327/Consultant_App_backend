<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    //
     protected $fillable = [

        'audit_id',
        'sid',
        'year',
        'month',
        'type',
        'auditresult',
        'crud',
        'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofinfo table and area table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasMany('App\Model\shopofinfo');
    }
}
