<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class StoreController extends Controller
{
    //

    public function insertStore(Request $request) {

      $area_name = $request->area_name;
      $area_id= DB::table('areas')->where('area_name', $area_name)->first()->area_id;

    	DB::table('shopofinfos')->insert([
    		
      		'area_id'        => $area_id,
      		'shop_style'     => $request->shop_style,
      		'shop_code'      => $request->shop_code,
      		'short_name'     => $request->short_name,
      		'shop_name'      => $request->shop_name,
      		'shop_address'   => $request->shop_address,
      		'shop_state'     => $request->shop_state,
      		'head_shop'      => $request->head_shop,
      		'isstandard'     => $request->isstandard,
      		'groupcode'      => $request->groupcode

    	]);

        
    	DB::table('shopofusers')->insert([            
    		        
        	'user_id' => Auth::user()->id,
      		'sid'     => DB::table('shopofinfos')->max('sid')

    	]);


    	DB::table('shop_environments')->insert([
    		      
        	'sid'                   => DB::table('shopofinfos')->max('sid'),      
      		'carbeauty_num'         => $request->carbeauty_num,
        	'car_quickrepair_num'   => $request->car_quickrepair_num,
        	'car4s_num'             => $request->car4s_num,
        	'car_repair_num'        => $request->car_repair_num,
        	'gas_station_num'       => $request->gas_station_num,
        	'supermarket_num'       => $request->supermarket_num,
        	'tyreshop_num'          => $request->tyreshop_num,
			    'club_num'              => $request->club_num,
			    'othershop_num'         => $request->othershop_num 

    	]);


    	DB::table('shop_descriptions')->insert([

    		  'sid'                  => DB::table('shopofinfos')->max('sid'),
      		'shopface_url'         => $request->shopface_url,
        	'open_time'            => date("Y-m-d", strtotime($request->open_time) ),
        	'decoration_time'      => date("Y-m-d", strtotime($request->decoration_time) ),
        	'shopruntime'          => date("Y-m-d", strtotime($request->shopruntime) ),
        	'DMS_time'             => date("Y-m-d", strtotime($request->DMS_time) ),
      		'fax'                  => $request->fax, 
      		'am'                   => $request->am, 
      		'zip_code'             => $request->zip_code, 
      		'shopkeeper'           => $request->shopkeeper,
      		'shopkeeper_tel'       => $request->shopkeeper_tel, 
      		'shopkeeper_email'     => $request->shopkeeper_email, 
      		'company_phone'        => $request->company_phone, 
        	'worker_num'           => $request->worker_num,
        	'station_num'          => $request->station_num,
      		'shop_area'            => $request->shop_area, 
      		'operation_area'       => $request->operation_area, 
      		'rest_area'            => $request->rest_area, 
        	'washcar_num'          => $request->washcar_num,
        	'lift_num'             => $request->lift_num,
      		'toilet'               => $request->toilet,
      		'init_cost'            => $request->init_cost,
      		'decoration_cost'      => $request->decoration_cost,
      		'device_cost'          => $request->device_cost, 
      		'league_cost'          => $request->league_cost, 
      		'stock_cost'           => $request->stock_cost, 
      		'payrent'              => $request->payrent, 
      		'bankliquidity'        => $request->bankliquidity,
      		'otherinvestment'      => $request->otherinvestment


    	]);         
    
      $datas = $request->business;      
      foreach ($datas as $key => $value) {
        if ($key) {         
          	DB::table('shopofbusiness')->insert([            
				'business_id'      => $key,
				'sid'              => DB::table('shopofinfos')->max('sid')        
        	]);  
        }
      }   	

    }
    public function updateStore(Request $request) {
        
        $sid        = $request->sid;
        $shop_code  = $request->shop_code;
        $short_name = $request->short_name;
        $shop_name  = $request->shop_name;
        $area_name = $request->area_name;
        $area_id= DB::table('areas')->where('area_name', $area_name)->first()->area_id;
    	DB::table('shopofinfos')->where('sid', $sid)->update([
    		
      		'area_id'        => $area_id,
      		'shop_style'     => $request->shop_style,
      		'shop_code'      => $request->shop_code,
      		'short_name'     => $request->short_name,
      		'shop_name'      => $request->shop_name,
      		'shop_address'   => $request->shop_address,
      		'shop_state'     => $request->shop_state,
      		'head_shop'      => $request->head_shop,
      		'isstandard'     => $request->isstandard,
      		'groupcode'      => $request->groupcode

    	]);    

    	DB::table('shop_environments')->where('sid', $sid)->update([    		      
        	  
      		'carbeauty_num'         => $request->carbeauty_num,
        	'car_quickrepair_num'   => $request->car_quickrepair_num,
        	'car4s_num'             => $request->car4s_num,
        	'car_repair_num'        => $request->car_repair_num,
        	'gas_station_num'       => $request->gas_station_num,
        	'supermarket_num'       => $request->supermarket_num,
        	'tyreshop_num'          => $request->tyreshop_num,
			    'club_num'		        => $request->club_num,
			    'othershop_num'         => $request->othershop_num  

    	]);


    	DB::table('shop_descriptions')->where('sid', $sid)->update([
    		  
      		'shopface_url'         => $request->shopface_url,
        	'open_time'            => date("Y-m-d", strtotime($request->open_time) ),
        	'decoration_time'      => date("Y-m-d", strtotime($request->decoration_time) ),
        	'shopruntime'          => date("Y-m-d", strtotime($request->shopruntime) ),
        	'DMS_time'             => date("Y-m-d", strtotime($request->DMS_time) ),
      		'fax'                  => $request->fax, 
      		'am'                   => $request->am, 
      		'zip_code'             => $request->zip_code, 
      		'shopkeeper'           => $request->shopkeeper,
      		'shopkeeper_tel'       => $request->shopkeeper_tel, 
      		'shopkeeper_email'     => $request->shopkeeper_email, 
      		'company_phone'        => $request->company_phone, 
        	'worker_num'           => $request->worker_num,
        	'station_num'          => $request->station_num,
      		'shop_area'            => $request->shop_area, 
      		'operation_area'       => $request->operation_area, 
      		'rest_area'            => $request->rest_area, 
        	'washcar_num'          => $request->washcar_num,
        	'lift_num'             => $request->lift_num,
      		'toilet'               => $request->toilet,
      		'init_cost'            => $request->init_cost,
      		'decoration_cost'      => $request->decoration_cost,
      		'device_cost'          => $request->device_cost, 
      		'league_cost'          => $request->league_cost, 
      		'stock_cost'           => $request->stock_cost, 
      		'payrent'              => $request->payrent, 
      		'bankliquidity'        => $request->bankliquidity,
      		'otherinvestment'      => $request->otherinvestment


     ]);

      DB::table('shopofbusiness')->where('sid', $sid)->delete();
      $datas = $request->business;      
      foreach ($datas as $key => $value) {
        if ($key) {         
		  if($value){
          	DB::table('shopofbusiness')->insert([            
				'business_id'      => $key,
				'sid'              => $sid        
        	]);
		  
		  }  
        }
      } 
    
    }

    public function getStore() {

      $id        = Auth::user()->id;
      $shopofusers      = DB::table('shopofusers')->where('user_id', $id)->get();
      $store_data = array();
	  
      foreach ($shopofusers as $shopofuser) {

        $shopinfos = DB::table('shopofinfos')->where('sid', $shopofuser->sid)->first();
        $data = [

           'sid'        => $shopofuser->sid,
           'shop_code'  => $shopinfos->shop_code,
           'short_name' => $shopinfos->short_name,
           'shop_name'  => $shopinfos->shop_name

        ];
        array_push($store_data, $data);
      }   	

     return json_encode($store_data);


    }


    public function getStoreInfo(Request $request) {

    	$id  = Auth::user()->id;
    	$sid = $request->sid;

    	$postdata = array();    

    	$shopofinfos = DB::table('shopofinfos')->where('sid', $sid)->first();
      $area = DB::table('areas')->where('area_id', $shopofinfos->area_id)->first();
      $parent = DB::table('areas')->where('area_id', $area->parent_id)->first();
      
      if(isset($parent)){
        $parent_name = trim($parent->area_name);
      }
      else{
        $parent_name = trim($area->area_name);
      }

    	$shopofinfo_data = [

    		  'sid'			      => $shopofinfos->sid,
      		'area_name'		   	  => trim($area->area_name),
          'parent_name'       => $parent_name,
      		'shop_style'	  	  => $shopofinfos->shop_style,
      		'shop_code'	        => $shopofinfos->shop_code,
      		'short_name'	      => $shopofinfos->short_name,
      		'shop_name'		      => $shopofinfos->shop_name,
      		'shop_address' 	    => $shopofinfos->shop_address,
      		'shop_state'	      => $shopofinfos->shop_state,
      		'head_shop'		      => $shopofinfos->head_shop,
      		'isstandard'	      => $shopofinfos->isstandard,
      		'groupcode'	          => $shopofinfos->groupcode

    	];
        array_push($postdata, $shopofinfo_data);

        $shopenvironments = DB::table('shop_environments')->where('sid', $sid)->first();
        $shopenvironments_data = [

        	'shop_environment_id'	   => $shopenvironments->shop_environment_id,        
        	'sid'					   => $shopenvironments->sid,
      		'carbeauty_num'			   => $shopenvironments->carbeauty_num,
        	'car_quickrepair_num'	   => $shopenvironments->car_quickrepair_num,
        	'car4s_num'				   => $shopenvironments->car4s_num,
        	'car_repair_num'		   => $shopenvironments->car_repair_num,
        	'gas_station_num'		   => $shopenvironments->gas_station_num,
        	'supermarket_num'		   => $shopenvironments->supermarket_num,
        	'tyreshop_num'			   => $shopenvironments->tyreshop_num,
			'club_num'				   => $shopenvironments->club_num,
			'othershop_num'			   => $shopenvironments->othershop_num


        ];
        array_push($postdata, $shopenvironments_data);

        $shopdescriptions = DB::table('shop_descriptions')->where('sid', $sid)->first();
        $shopdescription_data = [

        	'shop_description_id'	   => $shopdescriptions->shop_description_id,        
	        'sid'					   => $shopdescriptions->sid,
	      	'shopface_url'			   => $shopdescriptions->shopface_url,
	        'open_time'				   => $shopdescriptions->open_time,
	        'decoration_time'		   => $shopdescriptions->decoration_time,
	        'shopruntime'			   => $shopdescriptions->shopruntime,
	        'DMS_time'				   => $shopdescriptions->DMS_time,
	      	'fax'					   => $shopdescriptions->fax,
	      	'am'					   => $shopdescriptions->am,
	      	'zip_code'				   => $shopdescriptions->zip_code, 
	      	'shopkeeper'			   => $shopdescriptions->shopkeeper,
	      	'shopkeeper_tel'		   => $shopdescriptions->shopkeeper_tel, 
	      	'shopkeeper_email'		   => $shopdescriptions->shopkeeper_email, 
	      	'company_phone'			   => $shopdescriptions->company_phone, 
	        'worker_num'			   => $shopdescriptions->worker_num,
	        'station_num'			   => $shopdescriptions->station_num,
	      	'shop_area'				   => $shopdescriptions->shop_area, 
	      	'operation_area'		   => $shopdescriptions->operation_area, 
	      	'rest_area'				   => $shopdescriptions->rest_area, 
	        'washcar_num'			   => $shopdescriptions->washcar_num,
	        'lift_num'				   => $shopdescriptions->lift_num,
	      	'toilet'				   => $shopdescriptions->toilet, 
	      	'init_cost'				   => $shopdescriptions->init_cost, 
	      	'decoration_cost'		   => $shopdescriptions->decoration_cost, 
	      	'device_cost'			   => $shopdescriptions->device_cost, 
	      	'league_cost'			   => $shopdescriptions->league_cost, 
	      	'stock_cost'			   => $shopdescriptions->stock_cost, 
	      	'payrent'				   => $shopdescriptions->payrent, 
	      	'bankliquidity'			   => $shopdescriptions->bankliquidity, 
	      	'otherinvestment'		   => $shopdescriptions->otherinvestment      

        ];
        array_push($postdata, $shopdescription_data);

        $businessofdatas= DB::table('shopofbusiness')->where('sid', $sid)->get();
        $data1 = array();
        foreach ($businessofdatas as $businessofdata) {

         array_push($data1, $businessofdata->business_id);
                 
        }    
		 array_push($postdata, $data1);   
        return json_encode($postdata); 
    }

    public function searchStore(Request $request) {

    	 $name          = $request->store_name;
         $count         = strlen($name);
         $shop_data     = array();
         $shopofinfos   = DB::table('shopofinfos')->get();
         foreach ($shopofinfos as $shopofinfo) {

         	$compare_name = substr($shopofinfo->shop_name, 0, $count);
         	if($name == $compare_name) {
         		$data = [
           
		           'sid'        => $shopofinfo->sid,
		           'shop_code'  => $shopofinfo->shop_code,
		           'short_name' => $shopofinfo->short_name,
		           'shop_name'  => $shopofinfo->shop_name

    			];
    			array_push($shop_data, $data);
         	}
         }
         return json_encode($shop_data);
    }

    public function checkStore(Request $request) {

       $code  = $request->shop_code;
       $shopofinfos  = DB:: table('shopofinfos')->get();
       foreach ($shopofinfos as $shopofinfo) {
         $shop_code = $shopofinfo->shop_code;
         if ($code == $shop_code) {
           return json_encode(['success' => true]);
         }
       }
       return json_encode(['success' => false]);
    }

    public function getArea(){
      $areas = DB::table('areas')->get();
      $data = array();
      foreach ($areas as $area) {
        if($area->level == 1) {
          $area_data = array(
            'area_id'  => $area->area_id,
            'area_name'=>trim($area->area_name)
          );
          array_push($data, $area_data);
        }
      }

      return json_encode($data);
    }

    public function searchProvince(Request $request) {

         $name          = $request->area_name;
         $count         = strlen($name);
         $area_data     = array();
         $areas   = DB::table('areas')->get();
         foreach ($areas as $area) {            
          
          $compare_name = substr($area->area_name, 0, $count);
          if($name == $compare_name) {              
            $data = array(
           
               'area_id'    => $area_id,
               'area_name'  => trim($area->real_name)             

            );
          array_push($area_data, $data);
          }
         }
         return json_encode($area_data);

    }

    public function getCity(Request $request) {

      $area_name = $request->area_name;
      $area_id = DB::table('areas')->where('area_name', $area_name)->first()->area_id;
      $city_data = array();
      $citys = DB::table('areas')->where('parent_id', $area_id)->get();

      foreach ($citys as $city) {
        if($city->level == 2) {
          $data = array(
            'area_id'   => $city->area_id,
            'area_name' => trim($city->area_name),
            'code'      => trim($city->code)
          );

          array_push($city_data, $data);
        }
      }

      return json_encode($city_data);
    }
}
