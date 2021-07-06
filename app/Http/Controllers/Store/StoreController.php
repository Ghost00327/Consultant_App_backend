<?php

namespace App\Http\Controllers\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    /*___________________________________________________________________________
     |                                                                           |
     |  This method is used for getting  all store informations from storeinfo ta|
     |  ble .                                                                    |
     |___________________________________________________________________________|
     |                                                                           |  
     |  @retrun                                                                  |
     |   array(int: store_id) , array(store_name)                                |
     |___________________________________________________________________________|
     */

    public function getStore() {

      $stores     = DB::table('storeinfos')->get();
      $store_data = array();

      foreach($stores as $store) {  

         $data = [
           'store_id'   => $store->store_id,
           'store_name' => $store->st_name
         ];

         array_push($store_data, $data);

      }
      return json_encode($store_data);

    }
    
    /*___________________________________________________________________________
     |                                                                           |
     |  This method is used for getting  all store informations from storeinfo ta|
     |  ble .                                                                    |
     |___________________________________________________________________________|
     |                                                                           |  
     |  @retrun                                                                  |
     |   array(int: store_id) , array(store_name)                                |
     |___________________________________________________________________________|
     */
    public function insertStore(Request $request) {
        /*
         *----------------------------------------------------------------
         *  Insert new data into  storeinfo table.
         *----------------------------------------------------------------
         */
       // return $request->all();
       DB::table('storeinfos')->insert([      

            'st_name'             => $request->st_name,
            'store_id'            => $request->st_id,
            'st_shortname'        => $request->st_shortname,
            'st_type'             => $request->st_type,
            'st_status'           => $request->st_status,
            'st_starttime'        => date("Y-m-d H:i:s", strtotime($request->st_starttime) ),
            'startallow_time'     => date("Y-m-d H:i:s", strtotime($request->startallow_time) ),
            'equip_time'          => date("Y-m-d H:i:s", strtotime($request->equip_time) ),
            'dms_time'            => date("Y-m-d H:i:s", strtotime($request->dms_time) ),
            'st_province'         => $request->st_province,
            'st_city'             => $request->st_city,
            'st_address'          => $request->st_address,
            'photo_url'           => $request->photo_url,
            'email'               => $request->email,
            'AM'                  => $request->am,
            'manager'             => $request->manager,
            'hand_phone'          => $request->hand_phone,
            'telephone'           => $request->telephone

           ]);
          /*
           *----------------------------------------------------------------
           *  Insert new data into  storedescription table.
           *----------------------------------------------------------------
           */
          DB::table('storedescriptions')->insert([

            'st_id'             => DB::table('storeinfos')->max('id'),
            'total_area'        => $request->total_area,
            'work_area'         => $request->work_area,
            'rest_area'         => $request->rest_area,
            'member_num'        => $request->member_num,
            'lift_num'          => $request->lift_num,
            'carcleanroom_num'  => $request->carcleanroom_num,
            'toilet'            => $request->toilet

          ]);

        /*
         *--------------------------------------------------------------------
         *  insert new data into shop_in_range table.
         *--------------------------------------------------------------------
         */
          DB::table('shop_in_ranges')->insert([

           'st_id'                => DB::table('storeinfos')->max('id'),
           'cardecorationshop'    => $request->cardecorationshop,
           'carquickfixshop'      => $request->carquickfixshop,
           'car4Sshop'            => $request->car4Sshop,
           'carfixshop'           => $request->carfixshop,
           'addpetrolshop'        => $request->addpetrolshop,
           'largescaleshop'       => $request->largescaleshop,
           'traditionaltireshop'  => $request->traditionaltireshop,
           'memberclub'           => $request->memberclub,
           'othershop'            => $request->othershop

          ]);

          /*
           *----------------------------------------------------------------
           *  insert new data into initial_investments table.
           *----------------------------------------------------------------
           */
          DB::table('initial_investments')->insert([

           'st_id'          => DB::table('storeinfos')->max('id'),
           'init_amount'    => $request->init_amount,
           'decoration'     => $request->decoration,
           'equipment'      => $request->equipment,
           'stocking'       => $request->stocking,
           'prepaid_rent'   => $request->prepaid_rent,
           'bank_liquidity' => $request->bank_liquidity,
           'others'         => $request->others

         ]);

          /*
           *----------------------------------------------------------------
           *  Get all data related with given store_id from storeinfo table.
           *----------------------------------------------------------------
           */
          DB::table('service_contents')->insert([

            'st_id'              => DB::table('storeinfos')->max('id'),
            'engine_oil'         => $request->engine_oil,
            'brake'              => $request->brake,
            'battery'            => $request->battery,
            'sparkplug'          => $request->sparkplug,
            'lightbulb'          => $request->lightbulb,
            'filter'             => $request->filter,
            'carcleancard'       => $request->carcleancard,
            'manualcarclean'     => $request->manualcarclean,
            'decoration'         => $request->service_decoration,
            'autoclean'          => $request->autoclean,
            'waxing'             => $request->waxing,
            'polishing'          => $request->polishing,
            'protectionfilm'     => $request->protectionfilm,
            'seatcover'          => $request->seatcover,
            'tire'               => $request->tire,
            'wheelalgin'         => $request->wheelalign,
            'valve'              => $request->valve,
            'ballence'           => $request->ballence,
            'insurance'          => $request->insurance,
            'glass'              => $request->glass,
            'motor'              => $request->motor,
            'wiper'              => $request->wiper,
            'other'              => $request->other

          ]);
      

    }

    /*___________________________________________________________________________
     |                                                                           |
     |  This method is used for finding   store informations from storeinfo table|
     |                                                                           |   
     |___________________________________________________________________________|
     |                                                                           |  
     |  @retrun                                                                  |
     |   array(int: store_id) , array(store_name)                                |
     |___________________________________________________________________________|
     */

    public function searchStore(Request $request) {
      
      $name       = $request->store_name;
      $count      = strlen($name);
      $store_data = array();
      $stores     = DB::table('storeinfos')->get();

      foreach ($stores as $store) {        

        $store_id     = $store->store_id;
        $compare_name = substr($store->st_name, 0, $count);

        if($name == $compare_name){

          $data = [
             'store_id'   => $store_id,
             'store_name' => $store->st_name
          ];

          array_push($store_data, $data);
        }

      }
      return json_encode($store_data);
      
    }
    /*___________________________________________________________________________
     |                                                                           |
     |  This method is used for checking if given store exists.                  |
     |                                                                           |   
     |___________________________________________________________________________|
     |                                                                           |  
     |  @retrun                                                                  |
     |    bool (success => true, failed => false)                                |
     |___________________________________________________________________________|
     */
    public function checkStore(Request $request){

      $store_id  = $request->store_id;
      $stores    = DB::table('storeinfos')->get();

      foreach ($stores as $store) {

        $id = $store->store_id;

        if ($store_id == $id) return json_encode(['exist' => true]);
      }

      return json_encode(['exist' => false]);
    }
     /*___________________________________________________________________________
     |                                                                           |
     |  This method is used for updating five tables information                 |
     |                                                                           |   
     |___________________________________________________________________________|
     |                                                                           |  
     |  @retrun                                                                  |
     |    void                                                                   |
     |___________________________________________________________________________|
     */
    public function updateStore(Request $request) {
      /*
       *----------------------------------------------------------------
       *  update data into  storeinfo table.
       *----------------------------------------------------------------
       */
       // return $request->all();
      $id = DB::table('storeinfos')->where('store_id', $request->st_id)->first()->id;
       DB::table('storeinfos')->where('store_id', $request->st_id)->update([      
            'store_id'        => $request->new_st_id,
            'st_name'         => $request->st_name,            
            'st_shortname'    => $request->st_shortname,
            'st_type'         => $request->st_type,
            'st_status'       => $request->st_status,
            'st_starttime'    => date("Y-m-d H:i:s", strtotime($request->st_starttime) ),
            'startallow_time' => date("Y-m-d H:i:s", strtotime($request->startallow_time) ),
            'equip_time'      => date("Y-m-d H:i:s", strtotime($request->equip_time) ),
            'dms_time'        => date("Y-m-d H:i:s", strtotime($request->dms_time) ),
            'st_province'     => $request->st_province,
            'st_city'         => $request->st_city,
            'st_address'      => $request->st_address,
            'photo_url'       => $request->photo_url,
            'email'           => $request->email,
            'AM'              => $request->am,
            'manager'         => $request->manager,
            'hand_phone'      => $request->hand_phone,
            'telephone'       => $request->telephone

        ]);
        /*
         *----------------------------------------------------------------
         *  Insert new data into  storedescription table.
         *----------------------------------------------------------------
         */
          DB::table('storedescriptions')->where('st_id', $id)->update([

           
            'total_area'        => $request->total_area,
            'work_area'         => $request->work_area,
            'rest_area'         => $request->rest_area,
            'member_num'        => $request->member_num,
            'lift_num'          => $request->lift_num,
            'carcleanroom_num'  => $request->carcleanroom_num,
            'toilet'            => $request->toilet

          ]);

        /*
         *--------------------------------------------------------------------
         *  insert new data into shop_in_range table.
         *--------------------------------------------------------------------
         */
          DB::table('shop_in_ranges')->where('st_id', $id)->update([
          
          
           'cardecorationshop'          => $request->cardecorationshop,
           'carquickfixshop'            => $request->carquickfixshop,
           'car4Sshop'                  => $request->car4Sshop,
           'carfixshop'                 => $request->carfixshop,
           'addpetrolshop'              => $request->addpetrolshop,
           'largescaleshop'             => $request->largescaleshop,
           'traditionaltireshop'        => $request->traditionaltireshop,
           'memberclub'                 => $request->memberclub,
           'othershop'                  => $request->othershop

          ]);

          /*
           *----------------------------------------------------------------
           *  insert new data into initial_investments table.
           *----------------------------------------------------------------
           */
          DB::table('initial_investments')->where('st_id', $id)->update([           
           
           'init_amount'            => $request->init_amount,
           'decoration'             => $request->decoration,
           'equipment'              => $request->equipment,
           'stocking'               => $request->stocking,
           'prepaid_rent'           => $request->prepaid_rent,
           'bank_liquidity'         => $request->bank_liquidity,
           'others'                 => $request->others,
           'initialcost'            => $request->initialcost
 
         ]);

          /*
           *----------------------------------------------------------------
           *  Get all data related with given store_id from storeinfo table.
           *----------------------------------------------------------------
           */
          DB::table('service_contents')->where('st_id', $id)->update([            
            
            'engine_oil'         => $request->engine_oil,
            'brake'              => $request->brake,
            'battery'            => $request->battery,
            'sparkplug'          => $request->sparkplug,
            'lightbulb'          => $request->lightbulb,
            'filter'             => $request->filter,
            'carcleancard'       => $request->carcleancard,
            'manualcarclean'     => $request->manualcarclean,
            'decoration'         => $request->service_decoration,
            'autoclean'          => $request->autoclean,
            'waxing'             => $request->waxing,
            'polishing'          => $request->polishing,
            'protectionfilm'     => $request->protectionfilm,
            'seatcover'          => $request->seatcover,
            'tire'               => $request->tire,
            'wheelalgin'         => $request->wheelalign,
            'valve'              => $request->valve,
            'ballence'           => $request->ballence,
            'insurance'          => $request->insurance,
            'glass'              => $request->glass,
            'motor'              => $request->motor,
            'wiper'              => $request->wiper,
            'other'              => $request->other

          ]);
    }

}
