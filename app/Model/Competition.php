<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    //
    protected $fillable = [

      'st_id',
      'product_name',
      'product_remark',
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
