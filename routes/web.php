<?php

/*
|--------------------------------------------------------------------------
|       Basic route for mobile app
|--------------------------------------------------------------------------
|
| Here is where you can register mobile app routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'auth'], function () {
    /*
	 |-----------------------------------------------------------------
	 |    Routing for user login and logout.
	 |-----------------------------------------------------------------
	 */
	Route::group(['namespace' => 'Auth'], function () {
		Route::post('/login', 'LoginController@login');
		Route::get('/logout', 'LoginController@logout');
		Route::post('/register', 'RegisterController@create');
		
	});

});


/*
|--------------------------------------------------------------------------
|  Auth Middlware filters into all request to applications
|--------------------------------------------------------------------------
|  if user is not authenitcated, return login.
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
     
    Route::group(['prefix' => 'auth'], function () {
    /*
	 |-----------------------------------------------------------------
	 |    Routing for user login and logout.
	 |-----------------------------------------------------------------
	 */
	    Route::group(['namespace' => 'Auth'], function () {	

		   Route::get('/me', 'LoginController@getMember');

	    });

    });

    Route::group(['prefix' => 'user'], function () {

    	Route::post('/update', 'UserController@userUpdate');

		Route::post('/search', 'UserController@userSearch');

    });

	
    Route::group(['prefix' => 'store'], function () {

    	Route::post('/create', 'StoreController@insertStore');

    	Route::post('/update', 'StoreController@updateStore');

    	Route::get('/list', 'StoreController@getStore');

    	Route::post('/get', 'StoreController@getStoreInfo');

    	Route::post('/search', 'StoreController@searchStore');

    	Route::post('/check', 'StoreController@checkStore');
     
    });

    Route::group(['prefix' => 'staff'], function () {

    	Route::post('/list', 'StaffController@getStaff');

    	Route::post('/get', 'StaffController@getStaffInfo');

    	Route::post('/update', 'StaffController@updateStaff');

      Route::post('/search', 'StaffController@searchStaff');
      Route::post('/add', 'StaffController@insertStaff');

    });

	Route::group(['prefix' => 'plan'], function () {

	   Route::post('/create', 'PlanController@insertPlan');

	   Route::post('/list', 'PlanController@getPlan');
     Route::post('/get', 'PlanController@getPlanTime');
     Route::post('/update', 'PlanController@updatePlanTime');

     Route::post('/done', 'PlanController@planDone');



 	 });

   Route::group(['prefix' => 'visit'], function () {

		Route::post('/create', 'VisitController@insertVisit' );

    Route::post('/update', 'VisitController@updateVisit' );

		Route::post('/get', 'VisitController@getVisit');

		Route::post('/swot/add', 'VisitController@insertSwot');

    Route::post('/swot/update', 'VisitController@updateSwot');

		Route::post('/swot/get', 'VisitController@getSwot');

		Route::post('/annualplan/add', 'VisitController@insertAnnual');

		Route::post('/annualplan/get', 'VisitController@getAnnualplan');


   });
   Route::group(['prefix' => 'audit'], function () {

	   Route::post('/add',	'AuditController@addAudit' );
	   Route::post('/list', 'AuditController@getAudit');
     Route::post('/update', 'AuditController@updateAudit');
     Route::post('/get', 'AuditController@getAudits');

   });

   Route::group(['prefix' => 'posts'], function () {
     Route::get('/list',  'PlanController@getPosts' );
     Route::post('/read', 'PlanController@insertPosts');

   });
   
   Route::get('/plantype', 'PlanController@getPlanType');
   Route::get('/business', 'PlanController@getBusiness');  
   Route::get('/parents', 'UserController@getParents');
   Route::get('/friends', 'UserController@getFriends');
   Route::get('/province', 'StoreController@getArea');
   Route::post('/province/search', 'StoreController@searchProvince');
   Route::post('/city', 'StoreController@getCity');  

   /* image related route */

   Route::get('/imgitem/list', 'ImageController@getImageItem');
   Route::group(['prefix' => 'sopimg'], function () {
   Route::post('/list',  'ImageController@getSopImage' );
   Route::post('/add', 'ImageController@insertSopImage');
   Route::post('/update', 'ImageController@updateSopImage');
   });

   Route::get('/sopitem/list', 'ImageController@getSopItem');
   Route::post('/datareport/add', 'ReportController@insertDataReport');
   Route::post('/datareport/update', 'ReportController@updateDataReport');
   Route::post('/tyrestore/add', 'ReportController@insertTyreStore');
   Route::post('/tyresales/add', 'ReportController@insertTyreSale');
   Route::post('/tyreorder/add', 'ReportController@insertTyreOrder');
   Route::post('/againstbrand/add', 'ReportController@insertAgainstBrand');
   /*
    *
    */

   Route::post('/summary/add', 'ReportController@insertSummary');
   Route::post('/reminder/list', 'ReportController@getReminder');
   Route::post('/reminder/done', 'ReportController@reminderDone');
   Route::post('/chart/visitshop', 'ReportController@visitShop');
   Route::post('/chart/worktime', 'ReportController@workTime');
   Route::post('/docs/list', 'ImageController@getDocList');
   Route::get('/track/list', 'ImageController@getTrack');

   Route::group(['prefix' => 'action'], function() {

    Route::post('/add', 'ReportController@insertAction');
    Route::post('/get', 'ReportController@getAction');
   });
   Route::post('/tyrestore/list', 'ReportController@getTyrestore');
   Route::post('/tyreorder/list', 'ReportController@getTyreorder');
   Route::post('/tyresales/list', 'ReportController@getTyresales');
   Route::post('/againstbrand/list', 'ReportController@getAgainstbrand');
   Route::post('/summary/list', 'ReportController@getSummarymeeting');

   Route::post('/com/add', 'UserController@insertCom');
   Route::post('/com/list', 'UserController@getCom');
   Route::post('/eval/list', 'UserController@getSopDetail');
   Route::post('/sopresult/add', 'ImageController@insertSopResult');
   Route::post('/sopresult/get', 'ImageController@getSopResult');
   Route::post('/train/add', 'ImageController@insertTrain');
   Route::post('/train/list', 'ImageController@getTrain');
   Route::post('/sopresult/update', 'ImageController@updateSopResult');

});