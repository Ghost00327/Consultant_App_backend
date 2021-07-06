<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class AnnouncementController extends Controller
{

    
    //
    /*___________________________________________________________________________
     |                                                                           |
     |  This method is served for getting all datas from announcements table     |
     |___________________________________________________________________________|
     |                                                                           |
     |  @retrun                                                                  |
     |    var array(report_name, report_date, reort_content, receive_status)     |
     |___________________________________________________________________________|
     */
    public function getAnnouncement() {

      /*
       *----------------------------------------------------------------
       *  Getting all announcement data from announcement table.
       *----------------------------------------------------------------
       */
    	$announcements = DB::table('announcements')->get();
    	$array         = array();

    	foreach( $announcements as $announcement)
    	{    		

    		$name     = $announcement->reporter_name;
    		$date     = $announcement->report_date;
    		$content  = $announcement->announce_content;
    		$status   = $announcement->receive_status;
            
       /*
        *----------------------------------------------------------------
        *  Creating array with announcement data.
        *----------------------------------------------------------------
        */
        array_push($array, [

           'reporter_name' => $name,
           'report_date' => $date,
           'report_content' => $content,
           'receive_status' => $status
           
        ]);  
    		
    	}

    /*
     *----------------------------------------------------------------
     *  Return JSON data to front end.
     *----------------------------------------------------------------
     */
    	return json_encode($array);
    }
}
