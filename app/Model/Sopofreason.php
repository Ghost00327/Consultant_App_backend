<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sopofreason extends Model
{
    //
     protected $fillable = [

    	'sopofreason_id',
    	'visit_id',
    	'reason1',
        'reason2',
        'reason3',
        'reason4',
        'reason5',
        'reason6',
        'reason7',
        'reason8',
        'reason9',
        'reason10',
        'reason11',
        'reason12',
        'reason13',
        'reason14',
        'reason15',
        'reason16',
        'reason17',
        'reason18',
        'reason19',
        'reason20',
        'reason21',
        'reason22',
        'reason23',
        'reason24',
        'reason25',
        'reason26',
        'reason27',
        'reason28',
        'reason29',
        'reason30',
        'reason31',
        'reason32',
        'reason33',
        'reason34',
        'reason35',
        'reason36',
        'reason37',
        'reason38',
        'reason39',
        'reason40',
        'reason41',
        'reason42',
        'reason43',
        'reason44',
        'reason45',
        'reason46',
        'reason47',
        'reason48',
        'reason49',
        'reason50',
        'reason51',
        'reason52',
        'reason53',
        'reason54',
        'reason55',
        'reason56',
        'reason57',
        'reason58',
        'reason59',
        'reason60',
        'reason61',
        'reason62',
        'reason63',
        'reason64',
        'reason65',
        'reason66',
        'reason67',
        'reason68',
        'reason69',
        'reason70',
        'reason71',
        'reason72',
        'reason73',
        'reason74',
        'reason75',
        'reason76',
        'reason77',
        'reason78',
        'reason79',
        'reason80',
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and sopofreason table  |
   |___________________________________________________________________________|
   */
    public function visit()
    {
    	return $this->hasMany('App\Model\Visit');
    }
}
