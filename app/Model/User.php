<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
      
        'role_id',
        'area',
        'name',
        'password',
        'real_name',
        'en_name',
        'parent_uid',
       
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between user table and role table        |
     |___________________________________________________________________________|
     */
    public function roles()
    {
        return $this->hasMany('App\Model\Role');
    }

     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between user table and userofinfo table  |
     |___________________________________________________________________________|
     */
    public function userofinfo()
    {
        return $this->hasOne('App\Model\userofinfo');
    }
     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:n responding relationship between user table and shopofuser table  |
     |___________________________________________________________________________|
     */
    public function shopofusers()
    {
        return $this->belongsTo('App\Model\Shopofuser');
    }
     /*___________________________________________________________________________
     |                                                                           |
     |  set 1:1 responding relationship between user table and userofinfo table  |
     |___________________________________________________________________________|
     */
    public function plan()
    {
        return $this->belongsTo('App\Model\Plan');
    }

    
}
