<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     protected $fillable = [

      'st_id',
      'tire_id',
      'tire_name',
      'amount',
      'price',
      'subtotal_price',
      'reporter',
      'reporttime',
      'remark',
      'photo_url',

    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between StoreInfo table and orders       |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */
     public function storeinfo() {
     	return $this->belongsTo('App\Model\StoreInfo');
     }
}
