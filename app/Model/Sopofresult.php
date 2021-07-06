<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sopofresult extends Model
{
    //
     protected $table = 'sopofresult';
     protected $fillable = [

    	'sopofresult_id',
    	'visit_id',
    	'sop1',
        'sop2',
        'sop3',
        'sop4',
        'sop5',
        'sop6',
        'sop7',
        'sop8',
        'sop9',
        'sop10',
        'sop11',
        'sop12',
        'sop13',
        'sop14',
        'sop15',
        'sop16',
        'sop17',
        'sop18',
        'sop19',
        'sop20',
        'sop21',
        'sop22',
        'sop23',
        'sop24',
        'sop25',
        'sop26',
        'sop27',
        'sop28',
        'sop29',
        'sop30',
        'sop31',
        'sop32',
        'sop33',
        'sop34',
        'sop35',
        'sop36',
        'sop37',
        'sop38',
        'sop39',
        'sop40',
        'sop41',
        'sop42',
        'sop43',
        'sop44',
        'sop45',
        'sop46',
        'sop47',
        'sop48',
        'sop49',
        'sop50',
        'sop51',
        'sop52',
        'sop53',
        'sop54',
        'sop55',
        'sop56',
        'sop57',
        'sop58',
        'sop59',
        'sop60',
        'sop61',
        'sop62',
        'sop63',
        'sop64',
        'sop65',
        'sop66',
        'sop67',
        'sop68',
        'sop69',
        'sop70',
        'sop71',
        'sop72',
        'sop73',
        'sop74',
        'sop75',
        'sop76',
        'sop77',
        'sop78',
        'sop79',
        'sop80',
        'sum',
        'level',
    	'crud',
    	'dateover',

    ];
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between visit table and sopofresult table  |
   |___________________________________________________________________________|
   */
    public function visit()
    {
    	return $this->hasMany('App\Model\Visit');
    }
}
