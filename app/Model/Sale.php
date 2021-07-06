<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = [

      'st_id',
      'tire_id',
      'tire_name',
      'sales_amount',
      'sales_price',
      'total_price',
      'reporter',
      'reporttime',
      'remark',
      'photo_url',

    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and sales        |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
     public function storeinfo() {
     	return $this->belongsTo('App\Model\StoreInfo');
     }
}
