<?php

namespace App\Http\Controllers;
use App\CustomeLogin;
use Session;

use Illuminate\Http\Request;

class CustomeLoginController extends Controller
{
    public function login()
    {
        return view('customelogin.login')->with('login',CustomeLogin::all());
    }
    public function success(Request $request)
    {
        $email= $request->email;
        $password= $request->password;
        
        $compare= !!CustomeLogin::where('email',$email)->where('password',$password)->first();
        //dd($compare);
        if($compare==true)
        {
            return view('customelogin.bloodbankdashboard');
        }
        else
        {
        Session::flash('info','incorrect');
        return redirect()->back();
        }
       

    }
}
