<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopofbi extends Model
{
    //
     protected $fillable = [

        'shopbi_id',       
        'sid',
        'uid',
        'bi_date',      
        'crud',
        'dateover'

    ];

  
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function shopofinfos()
    {
    	return $this->hasMany('App\Model\Shopofinfo');
    }
   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between tradeofdata table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function tradeofdata()
    {
    	return $this->belongsTo('App\Model\Tradeofdata');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between saleofdata table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function saleofdata()
    {
    	return $this->belongsTo('App\Model\Saleofdata');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between saleofdata2 table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function saleofdata2()
    {
    	return $this->belongsTo('App\Model\Saleofdata2');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between businessofsummary table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function businessofsummary()
    {
    	return $this->belongsTo('App\Model\Businessofsummary');
    }
     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:1 responding relationship between maoliofdata table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function maoliofdata()
    {
    	return $this->belongsTo('App\Model\Maoliofdata');
    }
}
