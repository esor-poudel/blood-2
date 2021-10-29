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



Auth::routes();

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});


//Admin
Route::prefix('admin')->group(function () {
    Route::resource('events','EventsController');
    Route::resource('bloodbanks','BloodBankController');
    Route::resource('settings','SettingsController');
    Route::get('/add-city','DistrictCityController@cityadd')->name('city.add');
    Route::get('/city-create','DistrictCityController@citycreate')->name('city.create');
    Route::get('/show-enquiry','DonarsController@enquiry')->name('enquiry.index');
    Route::get('/all-donors','DonarsController@alldonar')->name('register.donar');
    Route::get('/new-donors','DonarsController@index')->name('donar');
    Route::get('donar-accept/{id}','DonarsController@restore')->name('donars.restore');
    Route::post('/donar-reject/{id}/{user_id}','DonarsController@kill')->name('donars.destroy');
    Route::get('/seeker-blood-request','NeedController@requestblood')->name('blood.request');
    Route::get('/home','HomeController@index')->name('home');


});

//donor
Route::prefix('donor')->group(function () {
    Route::get('/fill-donor-form','DonarsController@BecomeDonar')->name('donar.show');
    Route::get('/profile','ProfileController@index')->name('profile.index');
    Route::post('/change-profile/{id}','ProfileController@store')->name('profile.store');
    Route::post('/store','DonarsController@store')->name('donars.store');
    Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
    Route::get('/need-request','NeedController@donarview')->name('need.request');
    Route::get('/need-accept/{id}/{need}','NeedController@needaccept')->name('need.accept');
});

//frontend
Route::prefix('frontend')->group(function () {
    Route::post('/blood-need-save','NeedController@save')->name('need.save');
    Route::get('/donor-search','DonarSearchController@search')->name('donars.search');
    Route::post('/message-post','FrontEndController@store')->name('message.post');

});

Route::get('/','FrontEndController@index')->name('home.show');
Route::get('/getCity/{id}','DonarsController@getcity');
Route::get('/searchCity/{id}','FrontEndController@city');





























