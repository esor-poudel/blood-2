<?php

namespace App\Http\Controllers;
use App\District;
use App\City;
use App\Donar;
use App\Enquiry;
use App\Setting;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TJGazel\Toastr\Facades\Toastr;

class FrontEndController extends Controller
{
    public function index()
    {
        $district= District::all()->pluck('name','id');
        $setting= Setting::all();
        $donor= DB::table('donars')->whereMonth('d_date','>',Carbon::today()->month)->orderBy('id','DESC')->simplePaginate(4);
       
        $event= DB::table('events')->orderBy('id','DESC')->simplePaginate(4);
       // dd($donor);
        $time= Carbon::now()->toTimeString();
        Toastr::info('welcome seeker!');
        
        return view('welcome',compact('setting','donor'))->with('district',$district)->with('time', $time)
                                    ->with('event',$event);
    }
    public function city($id)
    {
        $city= City::where('district_id',$id)->pluck('name','id');
        return json_encode($city);
    }
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required',
           'number'=>'required',
           'message'=>'required',
           'email'=>'sometimes',
       ]);
       $enquiry= new Enquiry();
       $enquiry->name= $request->name;
       $enquiry->number= $request->number;
       $enquiry->message= $request->message;
       $enquiry->email= $request->email;
       $enquiry->save();
       Session::flash('success','message sent');
       return redirect()->back();
    }
}
