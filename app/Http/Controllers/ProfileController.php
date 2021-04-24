<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Session;
use App\Donar;

class ProfileController extends Controller
{
    public function index()
    {

        $current_profile= Donar::where('user_id',auth::id())->where('approved',1)->get();
      // dd($current_profile);
        $existing_donors = Donar::all()->pluck('user_id')->toArray(); 
        $show_form = true;
        $donor= Donar::where('user_id',auth::id())->get();
        if(in_array(auth::id(), $existing_donors))
            {
                $show_form = false;

            }
            if($show_form==true)
            {
                Session::flash('info','please fill up the donation form');
                return redirect()->back();
            }
            else{
             
                return view('donar.donars.edit')->with('current_profile',$current_profile)
                ->with('donor',$donor)
                ->with('show_form',$show_form);
            }

       
    }

    public function store(Request $request,$id)
    {
       
        $this->validate($request,[

            'date'=>'required|date_format:Y-m-d|before:'.Carbon::now(),
            'image'=>'image'
        ]);
        $donar = Donar::find($id);
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/image',$filename);
            $donar->image=$filename;
        }
        $donar->d_date= $request->date;
        $donar->save();
        Session::flash('success','last donated date updated');
        return redirect()->back();
    }
}
