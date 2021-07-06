<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Storeinfo extends Model
{
    //
     protected $fillable = [

        'st_name',
        'store_id',
        'st_shortname',
        'st_type',
        'st_status',
        'st_starttime',
        'startallow_time',
        'equip_time',
        'dms_time',
        'st_province',
        'st_city',
        'st_address',
        'photo_url',
        'email',
        'AM',
        'manager',
        'hand_phone',
        'telephone',
        
    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and SWOT_anaylyze|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public function swot_analyze() {
    	return $this->hasMany('App\Model\SWOT_analyze');
    }
     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and annual_plan  |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function annual_plan() {
    	return $this->hasOne('App\Model\Annual_plan');
    }

     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and inventory    |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function inventory() {
    	return $this->hasMany('App\Model\Inventory');
    }

     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and sales        |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function sale() {
    	return $this->hasOne('App\Model\Sale');
    }


     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and orders       |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function order() {
    	return $this->hasMany('App\Model\Order');
    }

     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and orders       |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function competition() {
    	return $this->hasMany('App\Model\Order');
    }
    
     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and storedescrip |
     |  tion table.                                                              |
     |___________________________________________________________________________|
     */
    public function storedescription() {
    	return $this->hasOne('App\Model\Storedescription');
    }
     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and shop_in_range|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
    public function shop_in_range() {
    	return $this->hasOne('App\Model\Shop_in_range');
    }

     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and initial_inves|
     |  tment table.                                                             |
     |___________________________________________________________________________|
     */
    public function initial_investment() {
        return $this->hasOne('App\Model\Initial_investment');
    }
     /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and service_conte|
     |  nt table.                                                                |
     |___________________________________________________________________________|
     */
    public function service_content () {
        return $this->hasOne('App\Model\Service_content');
    }

    /*__________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and employee table|
     |                                                                           |
     |___________________________________________________________________________|
     */
    public function employee () {
        return $this->hasMany('App\Model\Employee');
    }










}
