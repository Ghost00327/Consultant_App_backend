<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class ReportController extends Controller
{
    //
    public function insertDataReport(Request $request) {

    	if (isset($request->visit_id)) {

    		DB::table('datareports')->insert([

    			'visit_id'    => $request->visit_id,
          'user_id'     => Auth::user()->id,
    			'datatype'    => $request->datatype,
          'report_date' => date('Y-m-d H:i:s', strtotime($request->report_date)),
    			'comments'    => $request->comments

    		]);

    		return DB::table('datareports')->max('datareport_id');


    	}
    	else{

    		return "There is no visit_id !";
    	}
    }

    public function updateDataReport(Request $request) {

    	if (isset($request->datareport_id)) {

    		DB::table('datareports')->where('datareport_id', $request->datareport_id)->update([
    			 'total_amount' => $request->total_amount    			
    		]);
    	}
    	else{

    		return "There is no datareport_id !";
    	}
    }

    public function insertTyreStore(Request $request) {
 	
 	    $datas = array();
 	 	$datas = $request->all();

 	 	for($i = 0 ; $i < count($datas); $i++) {

 	 		DB::table('tyrestores')->insert([

 	 			'datareport_id' => $datas[$i]['datareport_id'],
 	 			'brand_code'    => $datas[$i]['brand_code'],
 	 			'brand_name'    => $datas[$i]['brand_name'],
 	 			'storenum'      => $datas[$i]['storenum']
 	 		]);
 	 	}
 	
       
    }

    public function insertTyreSale(Request $request) {
 		
 		$datas = array();
 	 	$datas = $request->all();

 	 	for($i = 0 ; $i < count($datas); $i++) {

 	 		DB::table('tyresales')->insert([

 	 			'datareport_id' => $datas[$i]['datareport_id'],
 	 			'brand_code'    => $datas[$i]['brand_code'],
 	 			'brand_name'    => $datas[$i]['brand_name'],
 	 			'salenum'       => $datas[$i]['salenum'],
 	 			'saleprice'		=> $datas[$i]['saleprice']
 	 		]);
 	 	}
       
    }

    public function insertTyreOrder(Request $request) {
 	
 	 	$datas = array();
 	 	$datas = $request->all();

 	 	for($i = 0 ; $i < count($datas); $i++) {

 	 		DB::table('tyreorders')->insert([

 	 			'datareport_id' => $datas[$i]['datareport_id'],
 	 			'brand_code'    => $datas[$i]['brand_code'],
 	 			'brand_name'    => $datas[$i]['brand_name'],
 	 			'ordernum'      => $datas[$i]['ordernum'],
 	 			'orderprice'    => $datas[$i]['orderprice'],
 	 			'order_total'   => $datas[$i]['order_total']
                
 	 		]);
 	 	}
       
    }

    public function insertAgainstBrand(Request $request) {
 	
 	 	$datas = array();
 	 	$datas = $request->all();

 	 	for($i = 0 ; $i < count($datas); $i++) {


 	 		DB::table('againstbrands')->insert([

 	 			'datareport_id' => $datas[$i]['datareport_id'], 	 			
 	 			'brand_name'    => $datas[$i]['brand_name'],
 	 			'detail'        => $datas[$i]['detail']
 	 			
 	 		]);
 	 	}
       
    }

    public function insertSummary(Request $request) {

        $datas = array();
        $datas = $request->all();
        for($i = 0 ; $i < count($datas); $i++) {


            DB::table('summarymeetings')->insert([
                'visit_id'       => $datas[$i]['visit_id'],
                'meeting_target' => $datas[$i]['meeting_target'],                 
                'meeting_subject'=> $datas[$i]['meeting_subject'],
                'meeting_people' => $datas[$i]['meeting_people'],
                'meeting_time'   => date("Y-m-d H:i:s", strtotime($datas[$i]['meeting_time'])),
                'effect'         => $datas[$i]['effect'],
                'comments'       => $datas[$i]['comments']                
            ]);
        }


    }
    public function getReminder(Request $request) {

        if($request->visit_id) {

            $visit_id = $request->visit_id;
            $action_data = array();

            $actionofplans = DB::table('actionofplans')->where('visit_id', $visit_id)->get();
            $shopofinfos = DB::table('visits')->where('visits.visit_id', '=', $visit_id)
                                              ->join('plans','visits.plan_id', 'plans.plan_id')
                                              ->join('shopofinfos', 'plans.sid', 'shopofinfos.sid')
                                              ->join('shop_descriptions', 'shopofinfos.sid', 'shop_descriptions.sid')->first();
            if (count($actionofplans) == 0 ) {
               
            }
            else{
                $current_time = date_create(date('Y-m-d'));
                foreach($actionofplans as $item) {

                    $data = array(
                        'actionofplan_id'  => $item->id,
                        'issue'            => $item->issue,
                        'action_target'    => $item->action_target,
                        'action_program'   => $item->action_program,
                        'executor'         => $item->executor,
                        'plan_complete_time' => $item->plan_complete_time,
                        'different'        => date_diff($current_time, date_create($item->plan_complete_time))->format('%R%a'),
                        'shop_code'        => $shopofinfos->shop->shop_code,
                        'shop_name'        => $shopofinfos->shop->shop_name,
                        'shopface_url'     => $shopofinfos->shopface_url


                    );
                }
            }
        }
    }

    public function reminderDone(Request $request) {
        if($request->actionofplan_id) {
            DB::table('actionofplans')->where('actionofplan_id', $request->actionofplan_id )->update(['iscomplete' => 1]);
        }
    }


    public function visitShop(Request $request) {

        if($request->year) {

            $year = $request->year;
            $user_id = Auth::user()->id;
            $plans = DB::table('plans')->where('plantype_id', '1')
                                       ->orWhere('plantype_id', '2')
                                       ->get();
            $jan = array();
            $feb = array();
            $mar = array();
            $apr = array();
            $may = array();
            $jun = array();
            $jul = array();
            $aug = array();
            $sep = array();
            $oct = array();
            $nov = array();
            $dec = array();


            foreach($plans as $plan) {
              if($plan->user_id == Auth::user()->id){

                $start_date = explode('-', $plan->start_date);
                if($start_date[0] == $year) {
                    switch ($start_date[1]) {
                        case '01':
                            array_push($jan, $start_date[1]);
                            break;
                         case '02':
                            array_push($feb, $start_date[1]);
                            break;
                         case '03':
                            array_push($mar, $start_date[1]);
                            break;
                         case '04':
                            array_push($apr, $start_date[1]);
                            break;
                         case '05':
                            array_push($may, $start_date[1]);
                            break;
                         case '06':
                            array_push($jun, $start_date[1]);
                            break;
                         case '07':
                            array_push($jul, $start_date[1]);
                            break;
                         case '08':
                            array_push($aug, $start_date[1]);
                            break;
                         case '09':
                            array_push($sep, $start_date[1]);
                            break;
                         case '10':
                            array_push($oct, $start_date[1]);
                            break;
                         case '11':
                            array_push($nov, $start_date[1]);
                            break;
                         case '12':
                            array_push($dec, $start_date[1]);
                            break;                        
                        
                    }
                }
              }
                
               
            }

            $data = array(
                'jan' => count($jan),
                'feb' => count($feb),
                'mar' => count($mar),
                'apr' => count($apr),
                'may' => count($may),
                'jun' => count($jun),
                'jul' => count($jul),
                'aug' => count($aug),
                'sep' => count($sep),
                'oct' => count($oct),
                'nov' => count($nov),
                'dec' => count($dec)
            );

            return json_encode($data);

            

        }

        
    }
   
    public function workTime(Request $request) {

         if($request->year) {

            $year = $request->year;
            $user_id = Auth::user()->id;
            $plans = DB::table('plans')->where('plantype_id', '1')
                                       ->orWhere('plantype_id', '2')
                                       ->where('user_id', $user_id)->get();
            $jan = array();$jan_sum = 0;
            $feb = array();$feb_sum = 0;
            $mar = array();$mar_sum = 0;
            $apr = array();$apr_sum = 0;
            $may = array();$may_sum = 0;
            $jun = array();$jun_sum = 0;
            $jul = array();$jul_sum = 0;
            $aug = array();$aug_sum = 0;
            $sep = array();$sep_sum = 0;
            $oct = array();$oct_sum = 0;
            $nov = array();$nov_sum = 0;
            $dec = array();$dec_sum = 0;


            foreach($plans as $plan) {

                $start_date = explode('-', $plan->start_date);
                if($start_date[0] == $year) {

                    switch ($start_date[1]) {
                        case '01':
                            $jan_sum = $jan_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '02':
                            $feb_sum = $feb_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '03':
                            $mar_sum = $mar_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '04':
                            $apr_sum = $apr_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '05':
                            $may_sum = $may_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '06':
                            $jun_sum = $jun_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '07':
                            $jul_sum = $jul_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '08':
                            $aug_sum = $aug_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '09':
                            $sep_sum = $sep_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '10':
                            $oct_sum = $oct_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '11':
                            $nov_sum = $nov_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;
                         case '12':
                            $dec_sum = $dec_sum + $this->timeCalc($plan->start_time, $plan->end_time);
                            break;                        
                        
                    }
                }
                
               
            }

            $data = array(
                'jan' => $jan_sum,
                'feb' => $feb_sum,
                'mar' => $mar_sum,
                'apr' => $apr_sum,
                'may' => $may_sum,
                'jun' => $jun_sum,
                'jul' => $jul_sum,
                'aug' => $aug_sum,
                'sep' => $sep_sum,
                'oct' => $oct_sum,
                'nov' => $nov_sum,
                'dec' => $dec_sum
            );

            return json_encode($data);

            

        }

        
    }

    public function timeCalc($time1, $time2){
        $firstTime = strtotime($time1);
        $secondTime = strtotime($time2);

        $diff_time =  date('H', $secondTime - $firstTime);
        return $diff_time;

    }

    public function insertAction (Request $request) {

        $data = array();
        $data = $request->all();
        for($i = 0; $i < count($data); $i++) {

           DB::table('actionofplans')->insert([

              'visit_id'              => $data[$i]['visit_id'],              
              'issue'                 => $data[$i]['issue'], 
              'action_target'         => $data[$i]['action_target'],
              'action_program'        => $data[$i]['action_program'],
              'executor'              => $data[$i]['executor'], 
              'develop_time'          => date("Y-m-d", strtotime( $data[$i]['develop_time'])),
              'plan_complete_time'    => date("Y-m-d", strtotime($data[$i]['plan_complete_time'])),              
              'iscomplete'            => 0,
              'comments'              => $data[$i]['comments'], 
              'filename'              => $data[$i]['filename'], 
              'fileattach'            => $data[$i]['fileattach']

           ]);

        }
       
    }

    public function getAction(Request $request) {

      $visit_id = $request->visit_id;
      $actions = DB::table('actionofplans')->where('visit_id', $visit_id)->get();
      $send_data = array();

      foreach ($actions as $item) {
        $data = array(
              'actionofplan_id'       => $item->actionofplan_id,             
              'issue'                 => $item->issue ,
              'action_target'         => $item->action_target,
              'action_program'        => $item->action_program,
              'executor'              => $item->executor ,
              'develop_time'          => $item->develop_time,
              'plan_complete_time'    => $item->plan_complete_time,             
              'iscomplete'            => $item->iscomplete,
              'comments'              => $item->comments ,
              'filename'              => $item->filename ,
              'fileattach'            => $item->fileattach
        );
        
        array_push($send_data, $data);
      }

      return json_encode($send_data);
    }

    public function getTyrestore(Request $request) {

        $visit_id = $request->visit_id;
        $datas = DB::table('datareports')->where('datareports.visit_id', '=', $visit_id)
                                         ->where('datareports.datatype', '=', 'tyrestore')
                                         ->join('tyrestores', 'datareports.datareport_id', 'tyrestores.datareport_id')
                                         ->get();
        $send_data = array();
        foreach($datas as $item){
          $data = array(
            'brand_code'  => $item->brand_code,
            'brand_name'  => $item->brand_name,
            'comments'    => $item->comments,
            'user_name'   => DB::table('users')->where('id', $item->user_id)->first()->real_name,
            'report_date' => $item->report_date,
            'storenum'  => $item->storenum
          );
          array_push($send_data, $data);
        }
        return json_encode($send_data);
    }
    public function getTyreorder(Request $request) {

      $visit_id = $request->visit_id;
      $datas = DB::table('datareports')->where('datareports.visit_id', '=', $visit_id)
                                         ->where('datareports.datatype', '=', 'tyreorder')
                                         ->join('tyreorders', 'datareports.datareport_id', 'tyreorders.datareport_id')
                                         ->get();
      $send_data = array();
      foreach($datas as $item){
        $data = array(
          'brand_code'  => $item->brand_code,
          'brand_name'  => $item->brand_name,
          'comments'    => $item->comments,
          'user_name'   => DB::table('users')->where('id', $item->user_id)->first()->real_name,
          'ordernum'    => $item->ordernum,
          'report_date' => $item->report_date,
          'orderprice'  => $item->orderprice,
          'order_total' => $item->order_total       

        );
        array_push($send_data, $data);
      }      
      return json_encode($send_data);
    }
    public function getTyresales(Request $request) {

      $visit_id = $request->visit_id;
      $datas = DB::table('datareports')->where('datareports.visit_id', '=', $visit_id)
                                         ->where('datareports.datatype', '=', 'tyresales')
                                         ->join('tyresales', 'datareports.datareport_id', 'tyresales.datareport_id')
                                         ->get();
      $send_data = array();
      foreach($datas as $item){
        $data = array(
          'brand_code'  => $item->brand_code,
          'brand_name'  => $item->brand_name,
          'comments'    => $item->comments,
          'user_name'   => DB::table('users')->where('id', $item->user_id)->first()->real_name,
          'report_date' => $item->report_date,
          'salenum'     => $item->salenum,
          'saleprice'   => $item->saleprice          
        );
        array_push($send_data, $data);
      }      
      return json_encode($send_data);
    }
    public function getAgainstbrand(Request $request) {

      $visit_id = $request->visit_id;
      $datas = DB::table('datareports')->where('datareports.visit_id', '=', $visit_id)
                                         ->where('datareports.datatype', '=', 'agianstbrand')
                                         ->join('againstbrands', 'datareports.datareport_id', 'againstbrands.datareport_id')
                                         ->get();
      $send_data = array();
      foreach($datas as $item){
        $data = array(
          'brand_code'  => $item->brand_code,
          'comments'    => $item->comments,
          'user_name'   => DB::table('users')->where('id', $item->user_id)->first()->real_name,
          'report_date' => $item->report_date,
          'detail'  => $item->detail        
        );
        array_push($send_data, $data);
      }      
      return json_encode($send_data);
    }

    public function getSummarymeeting(Request $request){
      $visit_id = $request->visit_id;
      $datas = DB:: table('summarymeetings')->where('visit_id', $visit_id)->get();
      $send_data = array();

      foreach($datas as $item) {
        $data = array(

          'meeting_target'  => $item->meeting_target,
          'meeting_subject' => $item->meeting_subject,          
          'meeting_people'  => $item->meeting_people, 
          'meeting_time'    => $item->meeting_time,
          'effect'          => $item->effect, 
          'comments'        => $item->comments,
          'image1'          => $item->image1, 
          'image2'          => $item->image2, 
          'image3'          => $item->image3, 
          'image4'          => $item->image4   
          
        );
        array_push($send_data, $data);
      }

        return json_encode($send_data);
    }



}
