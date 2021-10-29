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
            $approvedDonor= Donar::where('approved',1)->where('user_id',Auth::id())->first();
            $donor= Donar::where('user_id',auth::id())->first();
            $to = Carbon::parse($donor->d_date);
            $from = Carbon::now();
            $diff_in_months = $to->diffInMonths($from);
            $bloodNeed= Need::where('status',0)->get();
             return view('donardashboard')
                                    ->with('existing_donar',$show_form)
                                    ->with('donar',$approvedDonor)
                                    ->with('need',$bloodNeed)
                                    ->with('donor',$donor)
                                    ->with('month',$diff_in_months);

    }
}
