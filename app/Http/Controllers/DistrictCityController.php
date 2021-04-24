<?php

namespace App\Http\Controllers;

use App\City;
use Session;
use Illuminate\Http\Request;

class DistrictCityController extends Controller
{
    
    public function cityadd()
    {
        $city= City::all();
        return view('admin.district-city.city')->with('city',$city);
    }
    public function citycreate(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required| unique:cities',
            'district'=>'required'
        ]);
        $city= new City();
        $city->name= $request->name;
        $city->district_id= $request->district;
        $city->save();
        Session::flash('success','district created sucess');
        return redirect()->back();
    }
    
}
