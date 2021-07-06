<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopanalysis extends Model
{
    //
     protected $fillable = [

        'shopanalysis_id',
        'sid',
        'S_selft',
        'S_selft1',
        'S_selft2',
        'W_owner',
        'W_owner1',
        'W_owner2',
        'O_change',
        'O_change1',
        'O_change2',
        'T_danger',
        'T_danger1',
        'T_danger2',
        'increase',
        'increase1',
        'increase2',
        'plan_1',
        'plan_2',
        'plan_3',
        'plan_4',
        'plan_5',
        'plan_6',
        'plan_7',
        'plan_8',
        'plan_9',
        'plan_10',
        'plan_11',
        'plan_12',
        'other_plan',
        'crud',
        'dateover'

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between shopofinfo table and shopanalysis table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasMany('App\Model\shopofinfo');
    }
}
