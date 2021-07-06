<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AuditController extends Controller
{
    //
    public function addAudit(Request $request) {

    	if(isset($request)) {
    		DB::table('audits')->insert([
    			'sid'     => $request->sid,
    			'month'   => $request->month,
    			'type'    => $request->type,
    			'year'    => $request->year,
    			'auditresult' => $request->auditresult,
    			'crud'    => 'c'
    		]);
    	}
    }

    public function getAudit(Request $request) {

    	if (isset($request->sid)) {

	    	$sid = $request->sid;

	    	$audits = DB::table('audits')->where('sid', $sid)->get();
	    	$audit_data = array();

	    	foreach($audits as $item) {
	    		$data = array(

	    		  'audit_id' => $item->audit_id,
	    		  'auditresult' => $item->auditresult,
	    		  'month'   => $item->month,
	    		  'type'    => $item->type,
	    		  'year'    => $item->year
	    		);

	    		array_push($audit_data, $data);

	    	}
	    }

    	return json_encode($audit_data);

    }

    public function updateAudit(Request $request) {
      
       if (isset($request->audit_id)) {

       		DB::table('audits')->where('audit_id', $request->audit_id)->update([

       			'auditresult'  => $request->auditresult,
       			'type'         => $request->type
       		]);
       }
    }

    public function getAudits(Request $request) {

    if(isset($request->audit_id)){

      $data = DB::table('audits')->where('audit_id', $request->audit_id)->first();

      $audit_data = array(

        'type'      => $data->type,
        'year'        => $data->year,
        'month'       => $data->month,
        'auditresult' => $data->auditresult
        
      );

      return response()->json($audit_data);
    }
    else {

      return "there is no audit_id";
    }
  }
}
