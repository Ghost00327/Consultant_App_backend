<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use App\Model\Role;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
 /*
    |--------------------------------------------------------------------------
    |                       Login Controller                                  |
    |--------------------------------------------------------------------------
    |                                                                         |
    | This controller handles authenticating users for the application and    |
    | redirecting them to your home screen. The controller uses a trait       |
    | to conveniently provide its functionality to your applications.         |
    |--------------------------------------------------------------------------
    */ 
class LoginController extends Controller
{
   
    /*
     *  determine if user is autenticated
     *
     *  @return boolean
     */
   /*
    |--------------------------------------------------------------------------
    |     determine if user is authenticated for login                        |                                
    |--------------------------------------------------------------------------    
    |     @return                                                             |
    |        bool ( succuess => true, fail => false)                          |    
    |--------------------------------------------------------------------------
    */
    public function login(Request $request)
    {
       $username      = $request->u_name;
       $userpassword  = $request->password;       
       

       if (Auth::attempt(['name'=> $username, 'password'=> $userpassword]))
       { 
           
            
             return json_encode([         
             'success' => true            
             ]);
        
       }
     
       return json_encode([
             'success' => false]);
      
    }

    public function logout()
    {
       $this->middleware('guest', ['except' => 'logout']);    
      
    }


    /*
     *-----------------------------------------------------------------------------------------
     *       Get all information of authenticated user from users table.
     *-----------------------------------------------------------------------------------------
     */

    public function getMember() {
     // Getting authenticated user id.
      $id = Auth::user()->id;  

     /*
      *   Getting necessary informations from roles table
      */
      $role_id = DB::table('users')->where('id', $id)->first()->role_id;
      $name = DB::table('users')->where('id', Auth::user()->id)->first()->name;
      $role_name = DB::table('roles')->where('role_id', $role_id)->first()->role_name;
      $parent_id = DB::table('roles')->where('role_id', $role_id)->first()->parent_id;   
      /*
      *   Getting necessary informations from roles table
      */
      $user = DB::table('users')->where('id', $id)->first();   
      
      
      $userinfos = DB::table('userofinfos')->where('user_id', $id)->first();

      $info_data = [
          'u_name'               => $name,
          'role_name'            => $role_name,
          'parent_id'            => $parent_id,
          'area'                 => $user->area,
          'real_name'            => $user->real_name,
          'en_name'              => $user->en_name,
          'parent_uid'           => $user->parent_uid,
          'userofinfo_id'        => $userinfos->userofinfo_id,
          'user_id'              => $userinfos->user_id,
          'telephone'            => $userinfos->telephone, 
          'email'                => $userinfos->email,
          'description'          => $userinfos->description, 
          'headimgurl'           => $userinfos->headimgurl, 
          'sex'                  => $userinfos->sex,
          'company'              => $userinfos->company,
          'department'           => $userinfos->department,
          'position'             => $userinfos->position,
          'address'              => $userinfos->address,
          'birthdate'            => $userinfos->birthdate,
          'birthplace'           => $userinfos->birthplace, 
          'nation'               => $userinfos->nation,
          'id_card'              => $userinfos->id_card,
          'ismarry'              => $userinfos->ismarry,
          'graduate_date'        => $userinfos->graduate_date,
          'entry_date'           => $userinfos->entry_date,
          'emergent_phone'       => $userinfos->emergent_phone

      ];

      return response()->json($info_data);
    }

    
}
