<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Annual_plan extends Model
{
    //
    protected $fillable = [
    
      'store_id',
      'jan',
      'feb',
      'mar',
      'apr',
      'may',
      'jun',
      'jul',
      'aug',
      'sep',
      'oct',
      'nov',
      'dec',
      'remark',

    ];

      /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between StoreInfo table and annual       |
     |  table.                                                                   |
     |___________________________________________________________________________|
     */

    public function storeinfo() {
    	return $this->belongsTo('App\Model\Storeinfo');
    }
}
