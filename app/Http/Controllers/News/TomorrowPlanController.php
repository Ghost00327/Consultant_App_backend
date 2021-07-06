<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
class TomorrowPlanController extends Controller
{
    //
 /*___________________________________________________________________________
 |                                                                           |
 |  This method is used for getting all datas after current time             |
 |  from itinerary table                                                     |
 |___________________________________________________________________________|
 |                                                                           |
 |  @param                                                                   |
 |       itinerary_type, start_time, store_id                                |
 |  @retrun  array                                                           |
 |                                                                           |
 |___________________________________________________________________________|
 */
    public function getItinerary (Request $request)
    {
    	/*
    	 *--------------------------------------------------
    	 *  Getting all itinerary datas from itinerary table
    	 *--------------------------------------------------
    	 */
        $user_id    = Auth::user()->id;
    	  $itinerarys = DB::table('itinerarys')->where('mem_id', $user_id)->get();
    	  $onetime    = date("Y-m-d", strtotime($request->current_date) );
        $array      = array();

        foreach( $itinerarys as $itinerary)
        {   

          $twotime = date("Y-m-d", strtotime($itinerary->start_time) ); 

    	    if ($onetime == $twotime)
    	    {

    		     $type          = $itinerary->itinerary_type;
    		     $time          = $itinerary->start_time;
    		     $id            = $itinerary->store_id;  
             $itinerary_id  = $itinerary->id;
             $store         = DB::table('storeinfos')->where('store_id', $id)->first();
             $st_name       = $store->st_name;
             $shortname     = $store->st_shortname;    

             array_push($array, [

                 'itinerary_id'      => $itinerary_id,
                 'itinerary_type'    => $type,
                 'start_time'        => $time,
                 'store_id'          => $id,
                 'store_name'        => $st_name,
                 'store_shortname'   => $shortname

             ]);
       	  }               
            
    	}

    	return json_encode($array);
    }
/*___________________________________________________________________________
 |                                                                           |
 |  This method is used for updating  datas of member given member_id        |
 |  from itinerary table                                                     |
 |___________________________________________________________________________|
 |                                                                           |
 |  @param                                                                   |
 |       itinerary_type, start_time, store_id, end_time, duty, paticipator,  |
 |  @retrun  void                                                            |
 |                                                                           |
 |___________________________________________________________________________|
 */
   public function insertItinerary (Request $request)
   {
     
       /*
    	*-----------------------------------------------------------------------
    	*  Get authenticated user and user id (retreving the authenticated user)
    	*-----------------------------------------------------------------------
    	*/
     
       $user_id = Auth::user()->id;
       
       /*
    	*----------------------------------------------------------------
    	*  Request data to be inserted into itinerary table.
    	*----------------------------------------------------------------
    	*/
  
      $type       = $request->itinerary_type;
     //date( "Y-m-d H:i:s", strtotime("2014-12-15T19:42:27.100Z") );
      $start_time = date("Y-m-d H:i:s", strtotime($request->start_time) );
      $end_time   = date("Y-m-d H:i:s", strtotime($request->end_time) );
      $duty       = $request->duty;
      $store_id   = $request->store_id;
     
     
        /*
    	*----------------------------------------------------------------
    	*  Insert itinerary data into itinerary table.
    	*----------------------------------------------------------------
    	*/
       DB::table('itinerarys')->insert([

          'mem_id'           => $user_id,
          'itinerary_type'   => $type,
          'start_time'       => $start_time,
          'end_time'         => $end_time,
          'duty'             => $duty,
          'store_id'         => $store_id

      ]);
       

      $itinerary_id = DB::table('itinerarys')->max('id');     
      $paticipators = explode(',', $request->paticipator);
      $length       = count($paticipators);

      for ($i = 0; $i < $length; $i++)
      {
        $paticipator = $paticipators[$i];

        DB::table('paticipators')->insert([
          'itinerary_id'  => $itinerary_id,
          'paticipator'   => $paticipator
        ]);

      }  

   }
   
   /*
    |--------------------------------------------------------------------------
    |  This method is used for getting member name and member id from member  |
    |  table.         Search functionality                                    |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: Auth::user()->id, return: name => string and mem_id => integer|
    |                                                                         |
    |  @return                                                                |
    |    var array ( name, mem_id)                                            |
    |--------------------------------------------------------------------------
    */
   public function getName (Request $reqeust) {

      $name         = $reqeust->search_name;
      $count        = strlen($name);
      $member_data  = array();
      $members      = DB::table('members')->get();

      foreach ($members as $member)
      {      

        $member_id    = $member->mem_id;
        $compare_name = substr($member->name, 0, $count);

        if($name == $compare_name)
        {

          $data = [
             'member_id'   => $member_id,
             'member_name' => $member->name
          ];

          array_push($member_data, $data);
        }

      }
      return json_encode($member_data);     
   
   }
  

   /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting SWOT data into swot table.           |
    |                 Insert functionality                                    |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id, advantage, disadvantage, opportunity, threat, remark|
    |                                                                         |
    |  @return                                                                |
    |    void                                                                 |
    |--------------------------------------------------------------------------
    */
   public function  insertSWOT (Request $reqeust) {

   	$store_id         = $reqeust->store_id;
    $store            = DB::table('storeinfos')->where('store_id', $store_id)->first();
    $id               = $store->id;
   	$advantage        = $reqeust->advantage;
   	$disadvantage     = $reqeust->disadvantage;
   	$opportunity      = $reqeust->opportunity;
   	$threat           = $reqeust->threat;
   	$remark           = $reqeust->remark;

    /*
	   *----------------------------------------------------------------
	   *  Insert itinerary data into itinerary table.
	 	 *----------------------------------------------------------------
		 */
    DB::table('SWOT_analyze')->insert([

      'st_id'           => $id,
      'advantage'       => $advantage,
      'disadvantage'    => $disadvantage,
      'opportunity'     => $opportunity,
      'threat'          => $threat,
      'remark'          => $remark

    ]);
    
   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting annual plan data into annual_plan    |
    |  table.           Insert functionality                                  |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id, jan, feb, mar, apr, , apr, may, jun, jul, aug,   |
    |    sep, oct, nov, dec, remark                                           |
    |                                                                         |
    |  @return                                                                |
    |    void                                                                 |
    |--------------------------------------------------------------------------
    */
   public function  insertPlan (Request $reqeust) {

   	 $store_id    = $reqeust->store_id;
     $store       = DB::table('storeinfos')->where('store_id', $store_id)->first();
     $id          = $store->id;
   	 $jan         = $reqeust->jan;
   	 $feb         = $reqeust->feb;
   	 $mar         = $reqeust->mar;
   	 $apr         = $reqeust->apr;
   	 $may         = $reqeust->may;
   	 $jun         = $reqeust->jun;
   	 $jul         = $reqeust->jul;
   	 $aug         = $reqeust->aug;
   	 $sep         = $reqeust->sep;
   	 $oct         = $reqeust->oct;
   	 $nov         = $reqeust->nov;
   	 $dec         = $reqeust->dec;
   	 $remark      = $reqeust->remark;

    /*
	   *----------------------------------------------------------------
	   *  Insert annula plan data into annual_plan table.
	 	 *----------------------------------------------------------------
		 */
    DB::table('annual_plans')->insert([

    	'store_id' => $id,
    	'jan'      => $jan,
    	'feb'      => $feb,
    	'mar'      => $mar,
    	'apr'      => $apr,
    	'may'      => $may,
    	'jun'      => $jun,
    	'jul'      => $jul,
    	'aug'      => $aug,
    	'sep'      => $sep,
    	'oct'      => $oct,
    	'nov'      => $nov,
    	'dec'      => $dec,
    	'remark'   => $remark
           
    ]);
    
   }
   /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting action plan data into action_plan    |
    |  table.            Insert functionality                                 |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: itinerary_id, problem, action_target, executor, set_time,     |
    |      expected_time, expected_time, remark.                              |
    |                                                                         |
    |  @return                                                                |
    |    void                                                                 |
    |--------------------------------------------------------------------------
    */
   public function  insertAction (Request $reqeust) {

   	 $itinerary_id      = $reqeust->itinerary_id;
   	 $problem           = $reqeust->problem;
   	 $action_target     = $reqeust->action_target;
   	 $executor          = $reqeust->executor;
   	 $set_time          = date("Y-m-d H:i:s", strtotime($reqeust->set_time ));
   	 $expected_time     = date("Y-m-d H:i:s", strtotime( $reqeust->expected_time));
   	 $remark            = $reqeust->remark;


    /*
	   *----------------------------------------------------------------
	   *  Insert annula plan data into action_plan table.
	 	 *----------------------------------------------------------------
		 */
    DB::table('action_plans')->insert([

    	'itinerary_id'     => $itinerary_id,
    	'problem'          => $problem,
    	'action_target'    => $action_target,
    	'executor'         => $executor,
    	'set_time'         => $set_time,
    	'expected_time'    => $expected_time,
    	'remark'           => $remark ,
    	'action_status'    => true	
           
    ]);
    
   }
   /*
    |--------------------------------------------------------------------------
    |  This method is used for getting all data of 5 tables about store infor |
    |  mation.         Read functionality                                     |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id                                                      |
    |                                                                         |
    |  @return                                                                |
    |    var JSON data (all information)                                      |
    |--------------------------------------------------------------------------
    */
   public function getStoreinfo(Request $reqeust) {
      
   	  $store_id   = $reqeust->store_id;
   	  $memberdata = array();

   	  /*
	     *----------------------------------------------------------------
	     *  Get all data related with given store_id from storeinfo table.
	 	   *----------------------------------------------------------------
		   */
		   $storeinfo   = DB::table('storeinfos')->where('store_id', $store_id)->first();
       $id          = $storeinfo->id;

		   $storeinfo_data = [

		    'st_name'           => $storeinfo->st_name,
        'st_shortname'      => $storeinfo->st_shortname,
        'st_type'           => $storeinfo->st_type,
        'st_status'         => $storeinfo->st_status,
        'st_starttime'      => $storeinfo->st_starttime,
        'startallow_time'   => $storeinfo->startallow_time,
        'equip_time'        => $storeinfo->equip_time,
        'dms_time'          => $storeinfo->dms_time,
        'st_province'       => $storeinfo->st_province,
        'st_city'           => $storeinfo->st_city,
        'st_address'        => $storeinfo->st_address,
        'photo_url'         => $storeinfo->photo_url,
        'email'             => $storeinfo->email,
        'AM'                => $storeinfo->AM,
        'manager'           => $storeinfo->manager,
        'hand_phone'        => $storeinfo->hand_phone,
        'telephone'         => $storeinfo->telephone
      ];

       array_push($memberdata, $storeinfo_data);
        
      /*
	     *------------------------------------------------------------------------
	     *  Get all data related with given store_id from storedescriptions table.
	 	   *------------------------------------------------------------------------
		   */
       $storedescription = DB::table('storedescriptions')->where('st_id', $id)->first();

       $storedescription_data = [

          'total_area'            => $storedescription->total_area,
          'work_area'             => $storedescription->work_area,
          'rest_area'             => $storedescription->rest_area,
          'member_num'            => $storedescription->member_num,
          'lift_num'              => $storedescription->lift_num,
          'carcleanroom_num'      => $storedescription->carcleanroom_num,
          'toilet'                => $storedescription->toilet

       ];

       array_push($memberdata, $storedescription_data);

      /*
	     *----------------------------------------------------------------------
	     *  Get all data related with given store_id from shop_in_ranges table.
	 	   *----------------------------------------------------------------------
		   */
       $shop_in_range = DB::table('shop_in_ranges')->where('st_id', $id)->first();

       $shop_in_range_data = [

           'cardecorationshop'        => $shop_in_range->cardecorationshop,
           'carquickfixshop'          => $shop_in_range->carquickfixshop,
           'car4Sshop'                => $shop_in_range->car4Sshop,
       		 'carfixshop'               => $shop_in_range->carfixshop,
           'addpetrolshop'            => $shop_in_range->addpetrolshop,
           'largescaleshop'           => $shop_in_range->largescaleshop,
           'traditionaltireshop'      => $shop_in_range->traditionaltireshop,
           'memberclub'               => $shop_in_range->memberclub,
           'othershop'                => $shop_in_range->othershop

       ];
       
       array_push($memberdata, $shop_in_range_data);

      /*
	     *--------------------------------------------------------------------------
	     *  Get all data related with given store_id from initial_investments table.
	 	   *--------------------------------------------------------------------------
		   */
       $initial_investment = DB::table('initial_investments')->where('st_id', $id)->first();

       $initial_investment_data = [

           'init_amount'        => $initial_investment->init_amount,
           'decoration'         => $initial_investment->decoration,
           'equipment'          => $initial_investment->equipment,
           'stocking'           => $initial_investment->stocking,
           'prepaid_rent'       => $initial_investment->prepaid_rent,
           'bank_liquidity'     => $initial_investment->bank_liquidity,
           'others'             => $initial_investment->others,
           'initialcost'        => $initial_investment->initialcost

       ];

       array_push($memberdata, $initial_investment_data);

      /*
	     *-----------------------------------------------------------------------
	     *  Get all data related with given store_id from service_contents table.
	 	   *-----------------------------------------------------------------------
		   */
       $service_content = DB::table('service_contents')->where('st_id', $id)->first();

       $service_content_data = [

            'engine_oil'              => $service_content->engine_oil,
            'brake'                   => $service_content->brake,
            'battery'                 => $service_content->battery,
            'sparkplug'               => $service_content->sparkplug,
            'lightbulb'               => $service_content->lightbulb,
            'filter'                  => $service_content->filter,
            'carcleancard'            => $service_content->carcleancard,
            'manualcarclean'          => $service_content->manualcarclean,
            'service_decoration'      => $service_content->decoration,
            'autoclean'               => $service_content->autoclean,
            'waxing'                  => $service_content->waxing,
            'polishing'               => $service_content->polishing,
            'protectionfilm'          => $service_content->protectionfilm,
            'seatcover'               => $service_content->seatcover,
            'tire'                    => $service_content->tire,
            'wheelalign'              => $service_content->wheelalgin,
            'valve'                   => $service_content->valve,
            'ballence'                => $service_content->ballence,
            'insurance'               => $service_content->insurance,
            'glass'                   => $service_content->glass,
            'motor'                   => $service_content->motor,
            'wiper'                   => $service_content->wiper,
            'other'                   => $service_content->other

       ];

       array_push($memberdata, $service_content_data);

       return json_encode($memberdata);


   

   }
    /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting inventory data into inventory table  |
    |                  Read functionality                                     |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id, tire_id, tire_name, inventory_amount, reporter,     |
    |     report_time, remark, photo_url                                      |
    |  @return                                                                |
    |   void                                                                  |
    |--------------------------------------------------------------------------
    */
   public function insertInventory (Request $reqeust) {
      
       $st_id               = $reqeust->store_id;
       $id                  = DB::table('storeinfos')->where('store_id', $st_id)->first()->id;
       $tire_id             = $reqeust->tire_id;
       $tire_name           = $reqeust->tire_name;
       $inventory_amount    = $reqeust->inventory_amount;
       $reporter            = $reqeust->reporter;
       $report_time         = date("Y-m-d H:i:s", strtotime($reqeust->report_time) );
       $remark              = $reqeust->remark;
       $photo_url           = $reqeust->photo_url;
       

      /*
	     *----------------------------------------------------------------
	     *  Insert inventory data into inventory table.
	 	   *----------------------------------------------------------------
		   */
       DB::table('inventorys')->insert([

    	   'st_id'               => $id,
    	   'tire_id'             => $tire_id,
    	   'tire_name'           => $tire_name,
    	   'inventory_amount'    => $inventory_amount,
    	   'reporter'            => $reporter,
    	   'report_time'         => $report_time,
    	   'remark'              => $remark ,
    	   'photo_url'           => $photo_url
           
       ]);  

   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for insert sale data into sales tables             |
    |                  Put  functionality                                     |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id, tire_id, tire_name, sales_amount, sales_price       |
    |     total_price, reporter, report_time, remark, photo_url               |
    |  @return                                                                |
    |   void                                                                  |
    |--------------------------------------------------------------------------
    */
   public function insertSale (Request $reqeust) {
      
       $st_id           = $reqeust->store_id;
       $id              = DB::table('storeinfos')->where('store_id', $st_id)->first()->id;
       $tire_id         = $reqeust->tire_id;
       $tire_name       = $reqeust->tire_name;
       $sales_amount    = $reqeust->sales_amount;
       $sales_price     = $reqeust->sales_price;
       $total_price     = $reqeust->total_price;     
       $reporter        = $reqeust->reporter;
       $reporttime      = date("Y-m-d H:i:s", strtotime($reqeust->reporttime) );
       $remark          = $reqeust->remark;
       $photo_url       = $reqeust->photo_url;
       

      /*
	     *----------------------------------------------------------------
	     *  Insert sale data into sales table.
	 	   *----------------------------------------------------------------
		   */
       DB::table('sales')->insert([

    	   'st_id'         => $id,
    	   'tire_id'       => $tire_id,
    	   'tire_name'     => $tire_name,
    	   'sales_amount'  => $sales_amount,
    	   'sales_price'   => $sales_price,
    	   'total_price'   => $total_price,
    	   'reporter'      => $reporter,
    	   'reporttime'    => $reporttime,
    	   'remark'        => $remark ,
    	   'photo_url'     => $photo_url      

       ]);   

   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting order data into order table.         |
    |                  Insert functionality                                   |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: store_id, tire_id, tire_name, amount, price, subtotal_price   |
    |     , reporter, report time, remark, photo_url                          |
    |  @return                                                                |
    |   void                                                                  |
    |--------------------------------------------------------------------------
    */
   public function insertOrder (Request $reqeust) {
      
       $st_id           = $reqeust->store_id;
       $id              = DB::table('storeinfos')->where('store_id', $st_id)->first()->id;
       $tire_id         = $reqeust->tire_id;
       $tire_name       = $reqeust->tire_name;
       $amount          = $reqeust->amount;
       $price           = $reqeust->price;
       $subtotal_price  = $reqeust->subtotal_price;     
       $reporter        = $reqeust->reporter;
       $reporttime      = date("Y-m-d H:i:s", strtotime($reqeust->reporttime) );
       $remark          = $reqeust->remark;
       $photo_url       = $reqeust->photo_url;
       

      /*
	     *----------------------------------------------------------------
	     *  Insert order data into orders table.
	 	   *----------------------------------------------------------------
		   */
       DB::table('orders')->insert([

    	   'st_id'           => $id,
    	   'tire_id'         => $tire_id,
    	   'tire_name'       => $tire_name,
    	   'amount'          => $amount,
    	   'price'           => $price,
    	   'subtotal_price'  => $subtotal_price,
    	   'reporter'        => $reporter,
    	   'reporttime'      => $reporttime,
    	   'remark'          => $remark ,
    	   'photo_url'       => $photo_url   

       ]);   

   }

    /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting competition data into competition    |
    |  table.              Insert functionality                               |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: st_id, product_name, product_remark , reporter,report time,   |
    |           remark, photo_url                                             |
    |  @return                                                                |
    |   void                                                                  |
    |--------------------------------------------------------------------------
    */
   public function insertCompetition (Request $reqeust) {
      
       $st_id           = $reqeust->store_id;
       $id              = DB::table('storeinfos')->where('store_id', $st_id)->first()->id;     
       $product_name    = $reqeust->product_name;
       $product_remark  = $reqeust->product_remark;        
       $reporter        = $reqeust->reporter;
       $report_time     = date("Y-m-d H:i:s", strtotime($reqeust->reporttime) );
       $remark          = $reqeust->remark;
       $photo_url       = $reqeust->photo_url;
       

      /*
	     *----------------------------------------------------------------
	     *  Insert order data into orders table.
	 	   *----------------------------------------------------------------
		   */
       DB::table('competitions')->insert([

    	   'st_id'             => $id,
    	   'product_name'      => $product_name,
    	   'product_remark'    => $product_remark,
    	   'reporter'          => $reporter,
    	   'reporttime'        => $reporttime,
    	   'remark'            => $remark ,
    	   'photo_url'         => $photo_url       

       ]);   

   }
   /*
    |--------------------------------------------------------------------------
    |  This method is used for inserting communication data into communication|
    |  table.              Insert functionality                               |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input: st_id, tire_id, tire_name, amount, price, subtotal_price   |
    |     , reporter, report time, remark, photo_url                          |
    |  @return                                                                |
    |   void                                                                  |
    |--------------------------------------------------------------------------
    */
   public function insertCommunication (Request $reqeust) {
      
       $itinerary_id        = $reqeust->itinerary_id;       
       $com_member          = $reqeust->com_member;
       $com_time            = date("Y-m-d H:i:s", strtotime($reqeust->com_time) );        
       $com_content         = $reqeust->com_content;
       $com_result          = $reqeust->com_result;
       $remark              = $reqeust->remark;
       $photo_url           = $reqeust->photo_url;
       

      /*
	     *----------------------------------------------------------------
	     *  Insert order data into communications table.
	 	   *----------------------------------------------------------------
		   */
       DB::table('communications')->insert([

    	   'itinerary_id'      => $itinerary_id,
    	   'com_member'        => $com_member,
    	   'com_time'          => $com_time,
    	   'com_content'       => $com_content,
    	   'com_result'        => $com_result,
    	   'remark'            => $remark ,
    	   'photo_url'         => $photo_url        

       ]);   

   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for setting action_status  member_id as ture       |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        void                                                             |
    |--------------------------------------------------------------------------
    */
   public function check () {   
       

      /*
       *----------------------------------------------------------------
       *  Insert order data into communications table.
       *----------------------------------------------------------------
       */
      $user_id = Auth::user()->id;

      DB::table('action_plans')->where('itinerary_id', $user_id)->update(['action_status' => 1]);
      

   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for return only data with 'action_status'=false    |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        all store information                                            |
    |--------------------------------------------------------------------------
    */
   public function incomplete () {          

      /*
       *---------------------------------------------------------------------------
       *  Getting all information wiht action_status =false from action_plan table.
       *---------------------------------------------------------------------------
       */
      $actionPlans = DB::table('action_plans')->where('action_status', 0)->get();
      $action_data = array();

      foreach($actionPlans as $actionPlan){

        $data = [

            'itineray_id'   => $actionPlan->itinerary_id,
            'problem'       => $actionPlan->problem,
            'action_target' => $actionPlan->action_target,
            'exector'       => $actionPlan->exector,
            'set_time'      => $actionPlan->set_time,
            'expected_time' => $actionPlan->expected_time,
            'remark'        => $actionPlan->remark        
        ];

        array_push($action_data, $data);

      }

      return json_encode($action_data);   

   }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for return only data with 'action_status'=false    |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        all store information                                            |
    |--------------------------------------------------------------------------
    */

    public function reminderList (Request $reqeust) {

       $mem_id      = $reqeust->mem_id;
       $itinerarys  = DB::table('itinerarys')->where('mem_id', $mem_id)->get(); 
       $data        = array();
     
       foreach ($itinerarys as $itinerary) {

         $id            = $itinerary->id;
         $store_id      = DB::table('itinerarys')->where('mem_id', $mem_id)->first()->store_id;
         $store_name    = DB::table('storeinfos')->where('store_id', $store_id)->first()->st_name;     
         $actionPlan    = DB::table('action_plans')->where('itinerary_id', $id)->first();
         if ( $actionPlan->action_status == 0 )
         {

           $action_plan_data = [

            'itinerary_id'    => $actionPlan->itinerary_id,
            'store_id'        => $store_id,
            'store_name'      => $store_name,
            'problem'         => $actionPlan->problem, 
            'action_target'   => $actionPlan->action_target,
            'executor'        => $actionPlan->executor,
            'set_time'        => $actionPlan->set_time,
            'expected_time'   => $actionPlan->expected_time,
            'action_plan'     => $actionPlan->action_plan,
            'remark'          => $actionPlan->remark
           
           ];

           array_push($data, $action_plan_data);       
          }
         
        }

        if (empty($data)) return json_encode(['status' => 'there is no action plan']);
        else  return response()->json($data);
         
    
    }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for return only data with 'action_status'=false    |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        all store information                                            |
    |--------------------------------------------------------------------------
    */

    public function reminderCheck (Request $request) {

      $id = $request->itinerary_id;
      DB::table('action_plans')->where('itinerary_id', $id)->update(['action_status' => 1]);
      
    }
    
   /*
    |--------------------------------------------------------------------------
    |  This method is used for getting members from members table             |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        member's five information                                        |
    |--------------------------------------------------------------------------
    */
    public function getMember() {

      $members      = DB::table('members')->get();
      $member_data  = array();

      foreach($members as $member) {

        $data = [

          'mem_id'      => $member->mem_id,
          'name'        => $member->name,
          'department'  => $member->department,        
          'position'    => $member->position,
          'region'      => $member->region
        ];

        array_push($member_data, $data);
       
      }

      return json_encode($member_data);
    }
    /*
    |--------------------------------------------------------------------------
    |  This method is used for updating members from members table            |  
    |--------------------------------------------------------------------------
    |                                                                         |  
    |  @return                                                                |
    |        void                                                             |
    |--------------------------------------------------------------------------
    */
    public function updateMember(Request $request) {

      DB::table('members')->where('mem_id', $request->mem_id)->update([

         'photo_url'         => $request->photo_url,
         'name'              => $request->name,
         'gender'            => $request->gender,
         'company'           => $request->company,         
         'department'        => $request->department,
         'position'          => $request->position,
         'job_num'           => $request->job_num,
         'tele_num'          => $request->tele_num,
         'email'             => $request->email,
         'region'            => $request->region,        
         'birthday'          => $request->birthday,
         'nativeplace'       => $request->nativeplace,
         'nation'            => $request->nation,
         'IDnumber'          => $request->IDnumber,
         'maritalstatus'     => $request->maritalstatus,
         'child'             => $request->child,
         'address'           => $request->address,
         'emergency_contact' => $request->emergency_contact,
         'entrydate'         => date("Y-m-d H:i:s", strtotime( $request->entrydate ) ),
         'graduationdate'    => date("Y-m-d H:i:s", strtotime( $request->graduationdate ) )

      ]);

    }

   /*
    |--------------------------------------------------------------------------
    |  This method is used for get employee  data  with store_id from employee|
    |  table.              Read functionality                                 |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input:  store_id                                                     |
    |  @return                                                                |
    |    array   (name, gender, position, learn_identity)                     |
    |--------------------------------------------------------------------------
    */

    public function getEmployee(Request $request) {

       $store_id      = $request->store_id;
       $id            = DB::table('storeinfos')->where('store_id', $store_id)->first()->id;
       $employees     = DB::table('employees')->where('st_id', $id)->get();       
       $employee_data = array();

       foreach ($employees as $employee) {

         array_push($employee_data, [

            'id'             => $employee->id,
            'name'           => $employee->name,
            'gender'         => $employee->gender,
            'position'       => $employee->position,
            'learn_identity' => $employee->learn_identity
         ]);
         
       }

       return json_encode($employee_data);


       // return json_encode(['status' => true]);
    }

    /*
    |--------------------------------------------------------------------------
    |  This method is used for search employee  data  with store_id from emplo|
    |  yee table.              Search functionality                           |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input:  store_id                                                     |
    |  @return                                                                |
    |    array   (name, gender, position, learn_identity)                     |
    |--------------------------------------------------------------------------
    */

    public function searchEmployee(Request $request) {

      $name           = $request->employee_name;
      $count          = strlen($name);
      $employee_data  = array();
      $employees      = DB::table('employees')->get();

      foreach ($employees as $employee) {        
       
        $compare_name = substr($employee->name, 0, $count);

        if($name == $compare_name){

          $data = [

            'name'           => $employee->name,
            'gender'         => $employee->gender,
            'position'       => $employee->position,
            'learn_identity' => $employee->learn_identity

          ];

          array_push($employee_data, $data);
        }

      }
      return json_encode($employee_data);
    }

    /*
    |--------------------------------------------------------------------------
    |  This method is used for insert employee  data  with store_id from emplo|
    |  yee table.              Insert functionality                           |
    |--------------------------------------------------------------------------
    |                                                                         |
    |  @param                                                                 |
    |    input:  store_id                                                     |
    |  @return                                                                |
    |    array   (name, gender, position, learn_identity)                     |
    |--------------------------------------------------------------------------
    */

    public function insertEmployee(Request $request) {

      $st_id          = $request->store_id;                  
      $name           = $request->name;
      $gender         = $request->gender;
      $uid            = $request->uid;
      $learn_identity = $request->learn_identity;
      $position       = $request->position;
      $mobile         = $request->mobile;
      $entry_date     = date("Y-m-d H:i:s", strtotime($request->entry_date) );
      $duty_status    = $request->duty_status;
      $other          = $request->other;

      DB::table('employees')->insert([

          'st_id'             =>  $st_id,          
          'name'              =>  $name,
          'gender'            =>  $gender,
          'uid'               =>  $uid,
          'learn_identity'    =>  $learn_identity,
          'position'          =>  $position,
          'mobile'            =>  $mobile,
          'entry_date'        =>  $entry_date,
          'duty_status'       =>  $duty_status,
          'other'             =>  $other

      ]);

    }

    public function test() {

       return json_encode(['status' => true]);

    }


}
