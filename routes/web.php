<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'=>'home.show'
]);

Auth::routes();

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});

Route::get('/ipaddress',function(Request $request){
    $userIp = $request->ip();
  
    $locationData = Location::get('27.34.68.67');
    $data= array($locationData->longitude,$locationData->latitude);
   $cokkie= request()->cookie('location', $data , 10);
   dd($cokkie);
   return redirect()->back();
});

Route::get('/donar/search',[
    'uses'=>'DonarSearchController@search',
    'as'=>'donars.search'

]);

Route::get('/blood/need',[
        'uses'=>'NeedController@need',
        'as'=>'blood.need'
]);
Route::post('/blood/need/save',[
    'uses'=>'NeedController@save',
    'as'=>'need.save'
]);



 
Route::get('/home',[
    'uses'=>'HomeController@index',
    'as'=>'home'
]);


Route::get('/dashboard',[
    'uses'=>'HomeController@dashboard',
    'as'=>'dashboard'
]);


Route::get('/donar/becomedonar',[
    'uses'=>'DonarsController@BecomeDonar',
    'as'=>'donar.show'
]);

Route::get('/getCity/{id}',[
'uses'=>'DonarsController@getcity',
]);

Route::get('/searchCity/{id}',[
    'uses'=>'FrontEndController@city',
    ]);



Route::post('/login/users',[
        'uses'=>'LoginController@login',
        'as'=>'login.custome'
]);

Route::get('/seeker/blood/request/',[
        'uses'=>'NeedController@requestblood',
        'as'=>'blood.request'

]);

Route::post('/profile/store/{id}',[
    'uses'=>'ProfileController@store',
    'as'=>'profile.store'
]);

Route::get('/donar/profile',[
    'uses'=>'ProfileController@index',
    'as'=>'profile.index'
]);

Route::get('/seeker/need/accept/{id}/{need}',[
 
    'uses'=>'NeedController@needaccept',
    'as'=>'need.accept'
]);

Route::get('/donar/request/view',[
    'uses'=>'NeedController@donarview',
    'as'=>'donar.request.view'
]);

Route::resource('events','EventsController');
Route::resource('settings','SettingsController');

Route::post('/donars/store',[
    'uses'=>'DonarsController@store',
    'as'=>'donars.store'


]);

Route::get('/donars',[
    'uses'=>'DonarsController@index',
    'as'=>'donar'
]);

Route::get('donar/accept/{id}',[
    'uses'=>'DonarsController@restore',
    'as'=>'donars.restore'
]);
Route::post('/donar/delete/{id}/{user_id}',[
    'uses'=>'DonarsController@kill',
    'as'=>'donars.destroy'
]);

Route::get('/all/donars',[
    'uses'=>'DonarsController@alldonar',
    'as'=>'register.donar'
]);

Route::resource('bloodbanks','BloodBankController');
Route::get('/bank/login',[
    'uses'=>'CustomeLoginController@login',
    'as'=>'bloodbank.user'
]);
Route::post('/login/successful',[
    'uses'=>'CustomeLoginController@success',
    'as'=>'login.successful'
]);

Route::get('/city/add',[
    'uses'=>'DistrictCityController@cityadd',
    'as'=>'city.add'
]);

Route::get('/city/create',[
    'uses'=>'DistrictCityController@citycreate',
    'as'=>'city.create'
]);

Route::post('/message/post',[
    'uses'=>'FrontEndController@store',
    'as'=>'message.post'
]);
Route::get('/enquiry/show',[
    'uses'=>'DonarsController@enquiry',
    'as'=>'enquiry.index'
]);


