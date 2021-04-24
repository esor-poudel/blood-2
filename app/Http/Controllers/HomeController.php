<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Need;
use Carbon\Carbon;
use App\Donar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $existing_donors = Donar::all()->pluck('user_id')->toArray(); 
        $show_form = true;
        if(in_array(auth::id(), $existing_donors))
            {
                $show_form = false;

            }
            $count=0;
           $d= Donar::where('approved',1)->where('user_id',Auth::id())->whereMonth('d_date','>',Carbon::today()->month)->first();
           //dd($d);
           $n= Need::where('status',0)->get();//->pluck('blood_group')->first();
          //dd($n);
          $donor= Donar::where('user_id',auth::id())->get();
         
         
           
          
           
          //dd($count);


        return view('donardashboard')->with('current_donar_status',Donar::where('user_id',auth::id())->first())
                                    ->with('existing_donar',$show_form)
                                    ->with('donar',$d)
                                    ->with('need',$n)
                                    ->with('donor',$donor);
                              
    }
}