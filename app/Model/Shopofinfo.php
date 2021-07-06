<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopofinfo extends Model
{
    //
     
     protected $fillable = [
      
      'sid',
      'area_id',
      'shop_style',
      'shop_code',
      'short_name',
      'shop_name',
      'shop_address',
      'shop_state',
      'head_shop',
      'isstandard',
      'groupcode',
      'crud',
      'dateover',

    ];

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and area table  |
   |___________________________________________________________________________|
   */
    public function areas()
    {
    	return $this->hasMany('App\Model\Area');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and audit table  |
   |___________________________________________________________________________|
   */
    public function audits()
    {
    	return $this->belongsTo('App\Model\Audit');
    }
     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and audit table  |
   |___________________________________________________________________________|
   */
    public function shopanalysis()
    {
    	return $this->belongsTo('App\Model\Shopanalysis');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofbusiness table  |
   |___________________________________________________________________________|
   */
    public function shopofbusiness()
    {
    	return $this->belongsToMany('App\Model\Shopofbusiness');
    }
      /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shop_description table  |
   |___________________________________________________________________________|
   */
    public function shop_description()
    {
    	return $this->belongsTo('App\Model\Shop_description');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shop_environment table  |
   |___________________________________________________________________________|
   */
    public function shop_environment()
    {
    	return $this->belongsTo('App\Model\Shop_environment');
    }
     /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofstaff table  |
   |___________________________________________________________________________|
   */
    public function shopofstaff()
    {
    	return $this->belongsTo('App\Model\Shopofstaff');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofuser table  |
   |___________________________________________________________________________|
   */
    public function shopofusers()
    {
    	return $this->belongsTo('App\Model\Shopofuser');
    }
    /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and shopofbi table  |
   |___________________________________________________________________________|
   */
    public function shopofbis()
    {
    	return $this->belongsTo('App\Model\Shopofbi');
    }

   /*__________________________________________________________________________
   |                                                                           |
   |  set 1:n responding relationship between shopofinfo table and plan table  |
   |___________________________________________________________________________|
   */
    public function plan()
    {
    	return $this->belongsTo('App\Model\Plan');
    }


}
