<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Sopofresult;
class ImageController extends Controller
{
    //

    public function getImageItem() {

    	$imageitems = DB::table('imageitems')->get();

    	$item_data = array();

    	foreach($imageitems as $item) {

    		$data = array(

    		  'imageitem_id' => trim($item->imageitem_id),
    		  'itemname'     => trim($item->itemname)
    		);

    		array_push($item_data, $data);
    	}

    	return json_encode($item_data);
    }

    public function getSopImage (Request $request) {

    	if ( isset($request->visit_id)) {

    		$sopimages = DB::table('sopofimages')->where('visit_id', $request->visit_id)->get();

    		$sop_data = array();
    		foreach ($sopimages as $item) {
    			$data = array(

    				'sopofimage_id' => $item->sopofimage_id,
    				'photodate'     => $item->photodate,
    				'imgurl'        => $item->imgurl
    			);

    			array_push($sop_data, $data);
    		}

    		return json_encode($sop_data);
    	}
    	else {

    		return " You not sent visit_id";
    	}

    }

    public function insertSopImage (Request $request) {
         $count = 0;
         if (isset($request->visit_id)) {
         
         	$imageitems = DB::table('imageitems')->get();
         	foreach ($imageitems as $item) {
         		# code...
         		DB::table('sopofimages')->insert([
         			'visit_id'  => $request->visit_id,
         			'imageitem_id' => $item->imageitem_id
         		]);

         		$count++;
         	}

         	return $count;

         }
         else{

         	return "you must send visit_id";
         }
    	
    }
    public function updateSopImage (Request $request) {

    	if (isset($request->sopofimage_id)) {
    		$today = date("Y-m-d H:i:s");
    		DB::table('sopofimages')->where('sopofimage_id', $request->sopofimage_id)->update([

    			'photodate'   => $today,
    			'imgurl'      => $request->imgurl
    		]);
    	}
    	else {

    		return "you must send sopfoimage_id";
    	}
    	
    }

    public function getSopItem () {

    	$sopitems = DB::table('sopitems')->get();
    	$sopitem_data = array();
    	foreach($sopitems as $item) {
    		$data = array(
    			'sop_method1' => $item->sop_method1,
          'sop_detail'  => $item->sop_detail
    		);
    		array_push($sopitem_data, $data);
    	}

    	return json_encode($sopitem_data);
    }
    public function getDocList(Request $request) {
        $files = DB::table('files')->where('filetype', $request->filetype)->get();
        return json_encode($files);
    }


    public function getTrack() {
        $current_time = date_create(date('Y-m-d'));

        $plans = DB::table('plans')->where('plans.plantype_id', '=', 1)
                          ->orwhere('plans.plantype_id', '=', 2)                         
                          ->join('visits', 'plans.plan_id', 'visits.plan_id')
                          ->join('actionofplans', 'visits.visit_id', 'actionofplans.visit_id')                         
                          ->join('shopofinfos', 'plans.sid', 'shopofinfos.sid')
                          ->join('shop_descriptions', 'shopofinfos.sid', 'shop_descriptions.sid')
                          ->get();
                        
       $plan_data = array();
       foreach($plans as $plan) {

          if($plan->iscomplete == 0 && date_diff($current_time, date_create($plan->plan_complete_time))->format('%R%a') < 0 && $plan->user_id == Auth::user()->id ){
            $data = array (
                'actionofplan_id'  => $plan->actionofplan_id,
                'issue'            => $plan->issue,
                'action_target'    => $plan->action_target,
                'action_program'   => $plan->action_program,
                'executor'         => $plan->executor,
                'plan_complete_time' => $plan->plan_complete_time,
                'different'        => date_diff($current_time, date_create($plan->plan_complete_time))->format('%R%a'),
                'shop_code'        => $plan->shop_code,
                'shop_name'        => $plan->shop_name,
                'shopface_url'     => $plan->shopface_url,
                'iscomplete'       => $plan->iscomplete
            );

            array_push($plan_data, $data);
        }
       }

       return json_encode($plan_data);

    }

    public function insertSopResult(Request $request) {
      $visit_id = $request->visit_id;
      $result = $request->result;
      $count = count($result);    
      $old_id =  intval(Sopofresult::orderBy('sopofresult_id', 'desc')->first()->sopofresult_id);
      $sopofresult = new Sopofresult();
      $sopofresult->sopofresult_id = $old_id + 1;
      $sopofresult->visit_id = $visit_id;
      for ($i=1; $i <= $count; $i++) { 
        switch ($result[$i-1]) {
          case '0':
             $value = -1;
            break;
          case '1':
            $value = 0;
            break;
          case '2':
            $value = DB::table('sopitems')->where('sopitem_id', $i)->first()->standard_score;
            break; 
          default:
           break;         
        }       
        $sopname = 'sop'.$i;
        $sopofresult->$sopname = $value;
       
      }

      $sopofresult->save();
    }

    public function getSopResult(Request $request) {
      $visit_id = $request->visit_id;

      $sopresults = DB::table('sopofresult')->where('visit_id', $visit_id)->first();
      return json_encode($sopresults);
    }

    public function insertTrain(Request $request) {
      $data = array();
      $data = $request->all();
      for($i = 0; $i < count($data); $i++) {       
         DB::table('shopoftrains')->insert([
            'visit_id' =>$data[$i]['visit_id'],
            'train_people'  => $data[$i]['train_people'],
            'train_date' => date('Y-m-d H:i:s', strtotime($data[$i]['train_date'])),
            'train_content' => $data[$i]['train_content'],
            'train_result'  => $data[$i]['train_result']
           

         ]);
      }


    }

    public function getTrain(Request $request){
        $visit_id = $request->visit_id;
        $trains = DB::table('shopoftrains')->where('visit_id', $visit_id)->get();
        $send_data = array();
        foreach($trains as $item) {

            $data = array(

                'train_people'  => $item->train_people,
                'train_date' => $item->train_date,
                'train_content' => $item->train_content,
                'train_result'  => $item->train_result
                
            );

            array_push($send_data, $data);
        }

        return json_encode($send_data);
    }


}
