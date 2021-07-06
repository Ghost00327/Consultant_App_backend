<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [

       'file_id',
       'filename',
       'filetype',
       'filesize',
       'file_explain',
       'filepath',
       'filedate',
       'crud',
       'dateover',

    ];
   
}
