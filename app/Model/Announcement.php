<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = [

      'reporter_name',
      'report_date',
      'announce_content',
      'receive_status',
      
    ];
}
