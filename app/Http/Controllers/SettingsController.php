<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index')->with('settings',Setting::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create')->with('settings',Setting::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'email'=>'required',
                'address'=>'required',
                'contact_number'=>'required'
        ]);
        $settings= new Setting;
        $settings->email= $request->email;
        $settings->address=$request->address;
        $settings->contact_number=$request->contact_number;
        $settings->save();
        Session::flash('success','setting created successfully');
        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.settings.edit')->with('settings',Setting::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'email'=>'required',
            'address'=>'required',
            'contact_number'=>'required'
            ]);
            $settings= Setting::find($id);
            $settings->email= $request->email;
            $settings->address=$request->address;
            $settings->contact_number=$request->contact_number;
            $settings->save();
            Session::flash('success','setting updated successfully');
            return redirect()->route('settings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting= Setting::find($id);
        $setting->delete();
        Session::flash('success','setting deleted');
        return redirect()->back();
    }
}
