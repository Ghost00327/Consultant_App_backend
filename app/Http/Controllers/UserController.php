<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Sopofresult;
class UserController extends Controller
{
    //
    /*___________________________________________________________________________
     |                                                                           |
 	 |  This method is used for updating  datas of user and userofinfo given     |
     |  user_id from user table   and userofinfo table                           |
     |___________________________________________________________________________|
     |                                                                           |
     |  @param                                                                   |
     |       - user table                                                        |
     |          area, real_name, en_name                                         |
     |       - userofinfo                                                        |
     |          telephone, email, description, headimgurl, sex, company, departm |
     |         ent, position, address, birthdate, birthplace, nation, id_Card    |
     |         ismarry, graduatedate, entry_date, emergent_phone                 |
     |  @retrun  void                                                            |
     |                                                                           |
     |___________________________________________________________________________|
     */
    public function userUpdate(Request $request) {
     
   
      
      DB::table('users')->where('id', Auth::user()->id)->update([

            
      		'area'         => $request->area,
      		'real_name'    => $request->real_name,
      		'en_name'      => $request->en_name,
            

      ]);

      DB::table('userofinfos')->where('user_id', Auth::user()->id)->update([
            
      		'telephone'          => $request->telephone,
            'email'              => $request->email,
    	    'description'        => $request->description,
    	    'headimgurl'         => $request->headimgurl,
    		'sex'                => $request->sex,
    		'company'            => $request->company,
    		'department'         => $request->department,
    		'position'           => $request->position,
    		'address'            => $request->address,
    		'birthdate'          => date("Y-m-d", strtotime($request->birthdate) ),
    		'birthplace'         => $request->birthplace,
    		'nation'             => $request->nation,
    		'id_card'            => $request->id_card,
    		'ismarry'            => $request->ismarry,
    		'graduate_date'      => date("Y-m-d", strtotime($request->graduate_date) ),
    		'entry_date'         => date("Y-m-d", strtotime($request->entry_date) ),
    		'emergent_phone'      => $request->emergent_phone,

      ]);

    }

    public function getParents () {

        $id = Auth::user()->id;
        $user_data = $this->findParent($id);
        $data = array();        
        array_push($data, $user_data);       
        for ($i = DB::table('users')->where('id', $id)->first()->parent_uid ; $i > 0; $i--) {
           array_push($data, $this->findParent($i));
        }
        return json_encode($data);
    }  

    public function findParent($id) {

        $users  = DB::table('users')->where('id', $id)->first();
        $userinfos = DB::table('userofinfos')->where('user_id', $users->id)->first();
        $user_data = [
            'user_id'       => $users->id,
            'real_name'     => $users->real_name,
            'department'    => $userinfos->department,
            'area'          => $users->area,
            'position'      => $userinfos->position,
            'headimgurl'    => $userinfos->headimgurl
        ];
        return $user_data;
    }

   public function getFriends () {
        $id = Auth::user()->id;
        $area = DB::table('users')->where('id', $id)->first()->area;             
        $data = array();       
        for ($i = $id-1 ; $i > 0; $i--) {
           if ($this->findFriend($area, $i)) array_push($data, $this->findFriend($area, $i));
        }
        return json_encode($data);
   }

   public function findFriend ($area, $id) {

          $users  = DB::table('users')->where('id', $id)->first();
          if ($area == $users->area) {
            $userinfos = DB::table('userofinfos')->where('user_id', $users->id)->first();          
            $user_data = [
                'user_id'   => $users->id,
                'area'      => $users->area,
                'department'=> $userinfos->department,
                'real_name' => $users->real_name,
                'position'  => $userinfos->position,
                'headimgurl'    => $userinfos->headimgurl
            ]; 
            return $user_data;            
          }      

   }

   public function userSearch(Request $request) {

    	 $name          = $request->real_name;
         $count         = strlen($name);
         $user_data     = array();
         $users   = DB::table('users')->get();
         foreach ($users as $user) {
            
            $user_id = $user->id;
         	$compare_name = substr($user->real_name, 0, $count);
         	if($name == $compare_name) {

                $userofinfos = DB::table('userofinfos')->where('user_id', $user_id)->first();
         		$data = [
           
		           'user_id'    => $user_id,
		           'real_name'  => $user->real_name,
		           'department' => $userofinfos->department,
		           'position'   => $userofinfos->position

    			];
    			array_push($user_data, $data);
         	}
         }
         return json_encode($user_data);

   }


   public function insertCom(Request $request) {

     $data = array();
     $data = $request->all();
     for($i = 0; $i < count($data); $i++) {       
         DB::table('communications')->insert([
            'visit_id' =>$data[$i]['visit_id'],
            'people'  => $data[$i]['people'],
            'communication_time' => date('Y-m-d H:i:s', strtotime($data[$i]['communication_time'])),
            'content' => $data[$i]['content'],
            'result'  => $data[$i]['result'],
            'comments'=> $data[$i]['comments']

         ]);
     }



   }

    public function getCom(Request $request) {

        $visit_id = $request->visit_id;
        $communications = DB::table('communications')->where('visit_id', $visit_id)->get();
        $send_data = array();
        foreach($communications as $item) {

            $data = array(

                'people'  => $item->people,
                'communication_time' => $item->communication_time,
                'content' => $item->content,
                'result'  => $item->result,
                'comments'=> $item->comments
            );

            array_push($send_data, $data);
        }

        return json_encode($send_data);
    
   }

   public function getSopDetail(Request $request) {
     
    $id = Auth::user()->id;

    $sopresult = DB::table('plans')->where('plans.user_id', '=',  $id)
                               ->join('visits', 'plans.plan_id', 'visits.plan_id')
                               ->join('sopofresult', 'visits.visit_id', 'sopofresult.visit_id')->get();
  
    $count1 = false;$count2 = false;$count3 = false;$count4 = false;$count5 = false;$count6 = false;$count7 = false;
    $count8 = false;$count9 = false;$count10 = false;$count11 = false;$count12 = false;
    foreach ($sopresult as $item) {
        $keyname = date("m",strtotime($item->start_date));         
        switch ($keyname) {
            case '01':
                # code...
                $data[1] = $item;
               
                $count1 = true;
                break;
            case '02':
                # code...
                $data [2] = $item;
               
                $count2 = true;
                break;
            case '03':
                # code...
                $data [3] = $item;
               
                $count3 = true;
                break;
            case '04':
                # code...
                $data [4] = $item;
               
                $count4 = true;
                break;
            case '05':
                # code...
                $data [5] = $item;
               
                $count5 = true;
                break;
            case '06':
                # code...
                $data [6] = $item;
               
                $count6 = true;
                break;
            case '07':
                # code...
                $data [7] = $item;
               
                $count7 = true;
                break;
            case '08':
                # code...
                $data [8] = $item;
               
                $count8 = true;
                break;
            case '09':
                # code...
                $data [9] = $item;
               
                $count9 = true;
                break;
            case '10':
                # code...
                $data [10] =  $item;
               
                $count10 = true;
                break;
            case '11':
                # code...
                 $data [11] =  $item;
               
                $count11 = true;
                break;
            case '12':
                # code...
                $data [12] =  $item;
               
                $count12 = true;
                break;           
           
        }
    }
    if ($count1 == false) {
          $data[1] = null; 
          
    }
     if ($count2 == false) {
         $data[2] = null; 
          
    }
     if ($count3 == false) {
         $data[3] = null; 
          
    }
     if ($count4 == false) {
         $data[4] = null; 
          
    }
     if ($count5 == false) {
         $data[5] = null; 
          
    }
     if ($count6 == false) {
         $data[6] = null;  
          
    }
     if ($count7 == false) {
         $data[7] = null; 
          
    }
     if ($count8 == false) {
         $data[8] = null;  
          
    }
     if ($count9 == false) {
        $data[9] = null; 
          
    }
     if ($count10 == false) {
         $data[10] = null; 
          
    }
     if ($count11 == false) {
        $data[11] = null; 
          
    }
    if ($count12 == false) {
         $data[12] = null; 
          
    }
   
     return json_encode($data);
    
   }
}
