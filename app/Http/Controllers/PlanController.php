<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Plan;
use App\Model\Shopofinfo;
class PlanController extends Controller
{
    //

    public function getPlanType () {

    	$plantypes = DB::table('plantypes')->get();
		$data = array();
		foreach($plantypes as $plantype) {
			
			$plan_data = [
				'plantype_id'    => $plantype->plantype_id,
				'plantype_name'  => $plantype->plantype_name,
				'category'       => $plantype->category
			];

			array_push($data, $plan_data);
		}
		// $data = array();
        // $plantype_data = array();
		// $plan_category = array();
		// $temp = array();
		// $remember_category = array();
		// $data = array();
		// $count = 0;
    	// foreach ($plantypes as $plantype) {			
		// 	if (! in_array($plantype->category, $plan_category)) {
		// 			array_push($plan_category , $plantype->category);
		// 	}
           
		// }
		// for ($i = 0; $i < count($plan_category); $i++) {
		// 	$temp = [];
		// 	foreach($plantypes as $plantype){
		// 		if ($plan_category[$i] == $plantype->category) {														
		// 			array_push($temp, array('plantype_id' => $plantype->plantype_id,
		// 											 'plantype_name' => $plantype->plantype_name));	

		// 		}				
		// 	}	
		// 	$plantype_data = $temp;		
		// 	$data[$plan_category[$i]] = $plantype_data;				
		
		// }	    

        return json_encode($data);
     }


     public function getBusiness() {

    	$business_datas = DB::table('business')->get();
    	$data_business = array();
    	foreach ($business_datas as $business_data) {

    		$data = [

    			'business_id' => $business_data->business_id,
    			'business_name' => $business_data->business_name
    		];

    		array_push($data_business, $data);
    	}
	
 
    	return json_encode($data_business);
    }

	public function insertPlan(Request $request) {

		DB::table('plans')->insert([

			'plantype_id'   => $request->plantype_id,
			'sid'			=> $request->sid,
			'user_id'		=> Auth::user()->id,
			'start_date'    => date("Y-m-d"),
			'end_date'    	=> date("Y-m-d"),
			'start_time'  	=> date("H:i:s", strtotime($request->start_time) ),
			'end_time'    	=> date("H:i:s", strtotime($request->end_time) ),

		]);
	   
	}

	public function getPlan (Request $request) {
		$user_id = Auth::user()->id;
		$date = date("Y-m-d", strtotime($request->date) );
		$plans = DB::table('plans')->where('start_date', $date)
								   ->where('user_id', $user_id)->get();
		$plan_data = array();
		foreach($plans as $plan) {

			if ($date == $plan->start_date) {
				$category = DB::table('plantypes')->where('plantype_id', $plan->plantype_id)->first()->category;
				$plantype_name = DB::table('plantypes')->where('plantype_id', $plan->plantype_id)->first()->plantype_name;
				$shopofinfos = DB::table('shopofinfos')->where('sid', $plan->sid)->first();
				$data = [
					'plan_id'     => $plan->plan_id,
					'sid'		  => $plan->sid,
					'plantype_name' => $plantype_name,
					'shop_code'	  => $shopofinfos->shop_code,
					'short_name'  => $shopofinfos->short_name,
					'shop_name'   => $shopofinfos->shop_name,
					'plantype_id' => $plan->plantype_id,
					'category'	  => $category,
					'start_date'  => $plan->start_date,
					'end_date'    => $plan->end_date,
					'start_time'  => $plan->start_time,
					'end_time'    => $plan->end_time,
					'isdone'      => $plan->isdone

				];

				array_push($plan_data, $data);

			}
		
		}		

		return json_encode($plan_data);
	}

	public function addAction (Request $request) {

	   $data = array();
	   $data = $request->all();
      
     
	   for ($i = 0; $i< count($data); $i++) {

		DB::table('actionofplans')->insert([
			
			'visit_id'   			=> $data[$i]['visit_id'],
			'category'   			=> isset($data[$i]['category']) ? $data[$i]['category'] : null,
			'issue'   				=> isset($data[$i]['issue']) ? $data[$i]['issue'] : null, 
			'action_target'   		=> isset($data[$i]['action_target']) ? $data[$i]['action_target'] : null,
			'action_program'   		=> isset($data[$i]['action_program']) ? $data[$i]['action_program'] : null,
			'executor'   			=> isset($data[$i]['executor']) ? $data[$i]['executor'] : null, 
			'develop_time'   		=> isset($data[$i]['develop_time']) ? date("Y-m-d", strtotime($data[$i]['develop_time']) ) : null, 
			'plan_complete_time'   	=> isset($data[$i]['plan_complete_time']) ? date("Y-m-d", strtotime($data[$i]['plan_complete_time']) ) : null, 
			'actual_complete_time'  => isset($data[$i]['actual_complete_time']) ? date("Y-m-d", strtotime($data[$i]['actual_complete_time']) ) : null, 
			'iscomplete'   			=> isset($data[$i]['iscomplete']) ? $data[$i]['iscomplete'] : null,
			'comments'   			=> isset($data[$i]['comments']) ? $data[$i]['comments'] : null, 
			'filename'   			=> isset($data[$i]['filename']) ? $data[$i]['filename'] : null, 
			'fileattach'   			=> isset($data[$i]['fileattach']) ? $data[$i]['fileattach'] : null

		]);
		
	   } 

	}
  
	public function getAction (Request $request) {

		$visit_id = $request->visit_id;
		$actionplans = DB::table('actionofplans')->where('visit_id', $visit_id)->get();
		$action_data = array();
		foreach($actionplans as $actionplan) {
			$data = [

				'actionofplan_id'   	=> $actionplan->actionofplan_id,
				'category'   			=> $actionplan->category,
				'issue'   				=> $actionplan->issue, 
				'action_target'   		=> $actionplan->action_target,
				'action_program'   		=> $actionplan->action_program,
				'executor'   			=> $actionplan->executor, 
				'develop_time'   		=> $actionplan->develop_time, 
				'plan_complete_time'   	=> $actionplan->plan_complete_time, 
				'actual_complete_time'  => $actionplan->actual_complete_time, 
				'iscomplete'   			=> $actionplan->iscomplete,
				'comments'   			=> $actionplan->comments, 
				'filename'   			=> $actionplan->filename, 
				'fileattach'   			=> $actionplan->fileattach

			];
            array_push($action_data, $data);
		}
		return json_encode($action_data);

	}
	public function getPosts() {

		
		$infocenters = DB:: table('infocenters')->get();
       
		$post_data = array();
		foreach($infocenters as $infocenter) {

			$infocenter_id = $infocenter->infocenter_id;
			$real_name = DB::table('users')->where('id', $infocenter->user_id)->first()->real_name;
			$content = $infocenter->content;
			$dateover = $infocenter->dateover;

			$readinfos = DB::table('readofinfos')->where('infocenter_id', $infocenter_id)
												 ->where('user_id', Auth::user()->id)->first();	

			if (isset($readinfos)) $read_state = 1; else $read_state = 0;            
            $data = array(

            	'infocenter_id' => $infocenter_id,
            	'real_name'     => $real_name,
            	'content'       => $content,
            	'dateover'      => $dateover,
            	'read_state'    => $read_state
            );

            array_push($post_data, $data);          
		}

		return json_encode($post_data);


	}

	public function insertPosts(Request $request) {

			$user_id = Auth::user()->id;
			$infocenter_id = $request->infocenter_id;
			DB::table('readofinfos')->insert([
				'infocenter_id' => $infocenter_id,
				'user_id'       => $user_id,
				'crud'          => 'c'
			]);
	}


	public function getPlanTime(Request $request) {

		$plan_id = $request->plan_id;
		$plan = DB::table('plans')->where('plan_id', $plan_id)->first();

		$data = array(

			'start_time'  => $plan->start_time,
			'end_time'    => $plan->end_time,
			'isdone'      => $plan->isdone
		);

		return json_encode($data);

	}

	public function updatePlanTime(Request $request) {
		
		$plan_id = $request->plan_id;
		DB::table('plans')->where('plan_id', $plan_id)->update([

			'start_time' =>  date("H:i:s", strtotime($request->start_time) ),
			'end_time' =>  date("H:i:s", strtotime($request->end_time) )
		]);

	}

	public function planDone(Request $request) {

		if(isset($request->plan_id)) {

			$plan_id = $request->plan_id;

			DB::table('plans')->where('plan_id', $plan_id)->update(['isdone' => 1]);

		}
	}

	


}
