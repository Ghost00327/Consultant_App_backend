<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class VisitController extends Controller
{
    //
    public function insertVisit(Request  $request) {
       $plan_id             = $request->plan_id;
       // $arrive_time         = date("H:i:s", strtotime($request->arrive_time) );
       // $leave_time          = date("H:i:s", strtotime($request->leave_time) );
       // $arrive_position     = $request->arrive_position;
       // $leave_position      = $request->leave_position;
       // $lunch_time          = date("H:i:s", strtotime($request->lunch_time) );
       // $observed_time       = date("H:i:s", strtotime($request->observed_time) );
       // $review_time         = date("H:i:s", strtotime($request->review_time) );
       // $actionplan_time     = date("H:i:s", strtotime($request->actionplan_time) );
       // $train_time          = date("H:i:s", strtotime($request->train_time) );
       // $communication_time  = date("H:i:s", strtotime($request->communication_time) );
       // $summary_time        = date("H:i:s", strtotime($request->summary_time) );
       $visittarget         = $request->visittarget;
       $visitplan           = $request->visitplan;

       DB::table('visits')->insert([
            'plan_id'               => $plan_id,
            // 'arrive_time'           => $arrive_time,
            // 'leave_time'            => $leave_time,
            // 'arrive_position'       => $arrive_position,
            // 'leave_position'        => $leave_position,
            // 'lunch_time'            => $lunch_time,
            // 'observed_time'         => $observed_time,
            // 'review_time'           => $review_time,
            // 'actionplan_time'       => $actionplan_time,
            // 'train_time'            => $train_time,
            // 'communication_time'    => $communication_time,
            // 'summary_time'          => $summary_time,
            'visittarget'           => $visittarget,
            'visitplan'             => $visitplan
       ]); 
    }

    //
    public function updateVisit(Request  $request) {
       $visit_id = $request->visit_id;
       $plan_id             = $request->plan_id;
       $arrive_time         = isset($request->arrive_time) ? date("H:i:s", strtotime($request->arrive_time) ) : null;
       $leave_time          = isset($request->leave_time) ? date("H:i:s", strtotime($request->leave_time) ) : null;
       $arrive_position     = isset($request->arrive_position) ? $request->arrive_position : null;
       $leave_position      = isset($request->leave_position) ? $request->leave_position : null;
       // $lunch_time          = date("H:i:s", strtotime($request->lunch_time) );
       // $observed_time       = date("H:i:s", strtotime($request->observed_time) );
       // $review_time         = date("H:i:s", strtotime($request->review_time) );
       // $actionplan_time     = date("H:i:s", strtotime($request->actionplan_time) );
       // $train_time          = date("H:i:s", strtotime($request->train_time) );
       // $communication_time  = date("H:i:s", strtotime($request->communication_time) );
       // $summary_time        = date("H:i:s", strtotime($request->summary_time) );
       $visittarget         = isset($request->visittarget) ? $request->visittarget: null;
       $visitplan           = isset($request->visitplan) ? $request->visitplan: null;

       if($arrive_time !=null && $arrive_position != null) {

           DB::table('visits')->where('visit_id', $visit_id)->update([
            
            'arrive_time'           => $arrive_time,            
            'arrive_position'       => $arrive_position
                       
          ]); 

       }
      if($leave_time !=null && $leave_position != null) {

           DB::table('visits')->where('visit_id', $visit_id)->update([
            
            'leave_time'           => $leave_time,            
            'leave_position'       => $leave_position
                       
          ]); 

       }

      if($visittarget !=null && $visitplan != null) {

           DB::table('visits')->where('visit_id', $visit_id)->update([
            
            'visittarget'     => $visittarget,            
            'visitplan'       => $visitplan
                       
          ]); 

       }


      
    }

    public function getVisit (Request $request) {

        $plan_id = $request->plan_id;
        $visits  = DB::table('visits')->where('plan_id', $plan_id)->first();

        $visit_data = [

            'visit_id'              => $visits->visit_id,
            'plan_id'               => $visits->plan_id,
            'sid'                   => DB::table('plans')->where('plan_id', $visits->plan_id)->first()->sid,
            'arrive_time'           => $visits->arrive_time,
            'leave_time'            => $visits->leave_time,
            'arrive_position'       => $visits->arrive_position,
            'leave_position'        => $visits->leave_position, 
            'lunch_time'            => $visits->lunch_time,
            'observed_time'         => $visits->observed_time, 
            'review_time'           => $visits->review_time, 
            'actionplan_time'       => $visits->actionplan_time, 
            'train_time'            => $visits->train_time, 
            'communication_time'    => $visits->communication_time, 
            'summary_time'          => $visits->summary_time, 
            'visittarget'           => $visits->visittarget, 
            'visitplan'             => $visits->visitplan,
            'isdone'                => DB::table('plans')->where('plan_id', $plan_id)->first()->isdone
        ];
   
        return json_encode($visit_data);

    }
    
    public function insertSwot(Request $request) {

       DB::table('shopanalysis')->insert([

          'sid'           =>$request->sid,
          'S_selft'       =>$request->S_selft,
          //'S_selft1'      =>$request->S_selft1,
         //'S_selft2'      =>$request->S_selft2,
          'W_owner'       =>$request->W_owner,
         // 'W_owner1'      =>$request->W_owner1,
          //'W_owner2'      =>$request->W_owner2,
          'O_change'      =>$request->O_change,
         // 'O_change1'     =>$request->O_change1,
         // 'O_change2'     =>$request->O_change2,
          'T_danger'      =>$request->T_danger,
         // 'T_danger1'     =>$request->T_danger1,
          //'T_danger2'     =>$request->T_danger2
          'increase'      =>$request->increase
       ]);    

    }

    public function updateSwot(Request $request) {

       $sid = $request->sid;

       DB::table('shopanalysis')->where('sid', $sid)->update([

          //'sid'           =>$request->sid,
          'S_selft'       =>$request->S_selft,
          //'S_selft1'      =>$request->S_selft1,
         // 'S_selft2'      =>$request->S_selft2,
          'W_owner'       =>$request->W_owner,
         // 'W_owner1'      =>$request->W_owner1,
         // 'W_owner2'      =>$request->W_owner2,
          'O_change'      =>$request->O_change,
         // 'O_change1'     =>$request->O_change1,
         // 'O_change2'     =>$request->O_change2,
          'T_danger'      =>$request->T_danger,
         // 'T_danger1'     =>$request->T_danger1,
         // 'T_danger2'     =>$request->T_danger2
          'increase'      =>$request->increase
       ]);    

    }

    public function getSwot(Request $request) {

       $sid = $request->sid;
       $swots = DB::table('shopanalysis')->where('sid', $sid)->first();
       $swot_data = [

          'sid'           =>$swots->sid,
          'S_selft'       =>$swots->S_selft,
          //'S_selft1'      =>$swots->S_selft1,
         // 'S_selft2'      =>$swots->S_selft2,
          'W_owner'       =>$swots->W_owner,
         // 'W_owner1'      =>$swots->W_owner1,
         // 'W_owner2'      =>$swots->W_owner2,
          'O_change'      =>$swots->O_change,
         // 'O_change1'     =>$swots->O_change1,
         // 'O_change2'     =>$swots->O_change2,
          'T_danger'      =>$swots->T_danger,
          //'T_danger1'     =>$swots->T_danger1,
         // 'T_danger2'     =>$swots->T_danger2
          'increase'      =>$swots->increase

       ];
       return json_encode($swot_data);
    }
    
    public function insertAnnual(Request $request) {
      
        DB::table('shopanalysis')->where('sid', $request->sid)->update([

            'plan_1'     =>$request->plan_1,
            'plan_2'     =>$request->plan_2,
            'plan_3'     =>$request->plan_3,
            'plan_4'     =>$request->plan_4,
            'plan_5'     =>$request->plan_5,
            'plan_6'     =>$request->plan_6,
            'plan_7'     =>$request->plan_7,
            'plan_8'     =>$request->plan_8,
            'plan_9'     =>$request->plan_9,
            'plan_10'    =>$request->plan_10,
            'plan_11'    =>$request->plan_11,
            'plan_12'    =>$request->plan_12,
            'other_plan'    =>$request->other_plan

        ]);

        
    }
   


    public function getAnnualplan(Request $request) {

      $sid = $request->sid;

      $annualplans = DB::table('shopanalysis')->where('sid', $sid)->first();

      $annual_plan = [

            'plan_1'     =>$annualplans->plan_1,
            'plan_2'     =>$annualplans->plan_2,
            'plan_3'     =>$annualplans->plan_3,
            'plan_4'     =>$annualplans->plan_4,
            'plan_5'     =>$annualplans->plan_5,
            'plan_6'     =>$annualplans->plan_6,
            'plan_7'     =>$annualplans->plan_7,
            'plan_8'     =>$annualplans->plan_8,
            'plan_9'     =>$annualplans->plan_9,
            'plan_10'    =>$annualplans->plan_10,
            'plan_11'    =>$annualplans->plan_11,
            'plan_12'    =>$annualplans->plan_12,
            'other_plan'    =>$annualplans->other_plan

      ];

      return json_encode($annual_plan);
    }

}
