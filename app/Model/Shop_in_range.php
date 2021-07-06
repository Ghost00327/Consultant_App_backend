<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_in_range extends Model
{
    //
     protected $fillable = [

       'st_id',
       'cardecorationshop',
       'carquickfixshop',
       'car4Sshop',
       'carfixshop',
       'addpetrolshop',
       'largescaleshop',
       'traditionaltireshop',
       'memberclub',
       'othershop',

    ];

    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and Shop_in_range|
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
