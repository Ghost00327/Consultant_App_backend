<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class StaffController extends Controller
{
    //
    public function getStaff (Request $request) {

    	$sid = $request->sid;
    	$shopofstaffs = DB::table('shopofstaffs')->where('sid', $sid)->get();
        $data = array();
        // get all staff of responding shop
        foreach($shopofstaffs as $shopofstaff){
        	$shopofstaff_data = array(

        		'shopofstaff_id'  => $shopofstaff->shopofstaff_id,
        		'staff_name'      => $shopofstaff->staff_name,
        		'learn_identity'  => $shopofstaff->learn_identity,
        		'telephone'       => $shopofstaff->telephone,
                'head_url'        => $shopofstaff->head_url

        	);

            array_push($data, $shopofstaff_data);
        }

       
    	return json_encode($data);

    }


    public function getStaffInfo (Request $request) {

    	$sid            = $request->sid;
    	$shopofstaff_id = $request->shopofstaff_id;

    	$shopofstaffs = DB::table('shopofstaffs')->where('sid', $sid)
												 ->where('shopofstaff_id', $shopofstaff_id)
												 ->get();
    	
    	return json_encode($shopofstaffs);
    }

    public function updateStaff (Request $request) {

    	$shopofstaff_id  = $request->shopofstaff_id;

    	DB::table('shopofstaffs')->where('shopofstaff_id', $shopofstaff_id)->update([

    		       
	        'sid'				=> $request->sid,
	      	'staff_name'		=> $request->staff_name, 
	        'employ_state'		=> $request->employ_state,
	        'sex'				=> $request->sex,
	        'card_id'			=> $request->card_id,
	        'learn_identity'	=> $request->learn_identity,
	        'position'			=> $request->position,
	        'telephone'			=> $request->telephone,
	        'entry_date'		=> date("Y-m-d", strtotime($request->entry_date) ),
	        'education'			=> $request->education,
	        'head_url'			=> $request->head_url,
	        'description'		=> $request->description   

    	]);

    }

    public function searchStaff (Request $request) {

    	 $name       = $request->staff_name;
         $count      = strlen($name);
         $staff_data  = array();
         $staffofinfos = DB::table('shopofstaffs')->get();
         foreach ($staffofinfos as $staffofinfo) {

         	$compare_name = substr($staffofinfo->staff_name, 0, $count);
         	if($name == $compare_name) {

         		$data = [
           
		           'shopofstaff_id'        => $staffofinfo->shopofstaff_id,
		           'staff_name'  => $staffofinfo->staff_name,
		           'learn_identity' => $staffofinfo->learn_identity,
		           'telephone'  => $staffofinfo->telephone

    			];

    			array_push($staff_data, $data);
         	}
         }
         
         return json_encode($staff_data);
    }
     public function insertStaff(Request $request) {

       if(isset($request)) {
             DB::table('shopofstaffs')->insert([

                'sid'          => $request->sid,
                'description'  => $request->description,
                'education'    => $request->education,
                'employ_state' => $request->employ_state,
                'entry_date'   => date("Y-m-d", strtotime($request->entry_date)), 
                'learn_identity' => $request->learn_identity,
                'position'     => $request->position,
                'sex'          => $request->sex,
                'staff_name'   => $request->staff_name,
                'telephone'    => $request->telephone
             ]);
       }
    }
}
