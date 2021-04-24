<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Need;
use App\Donar;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
          //  dd($request->all());
          $conformation= Donar::all();

            if(Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password
            ]))
            {
                $user= User::where('email',$request->email)->first();
                if($user->is_admin())
                {
                        return redirect()->route('home');
                }
                            
                   
                return redirect()->route('dashboard')->with('conformation',$conformation);
            }
            return redirect()->back();
    }
}
