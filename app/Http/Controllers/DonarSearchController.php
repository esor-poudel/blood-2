<?php

namespace App\Http\Controllers;

use App\Donar;
use App\District;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Null_;

class DonarSearchController extends Controller
{
    public function search(Request $request)
    {
        $data= $request->all();
       if($data==null)
       {
           return redirect()->back();
       }
       else{

       
        
        
        $district = District::all();
        $city = City::all();
        $data= request()->all();
        $this->search= new Donar();
        $search = $this->search->getsearch($data);
       
        return view('seekers.result')->with('result', $search)
                    ->with('district', $district)
                    ->with('city', $city);
    }
}
}
