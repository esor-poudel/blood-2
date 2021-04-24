<?php

namespace App\Http\Controllers;
use App\BloodBank;
use Session;

use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bloodbank.index')->with('bloodbank',BloodBank::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bloodbank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $inputvalue= $request->all();
      // dd($inputvalue);
        $this->validate($request,[
            'name'=>'required',
            'blood_type'=>'required',
        ]);
       //echo $request->input('blood_type');
       $arrayToString= implode(',',$request->input('blood_type'));
       $inputvalue['blood_type']= $arrayToString;
    $bloodbank= BloodBank::create($inputvalue);
    if($bloodbank)
    {
        Session::flash('success','blood bank created');
    }else
    {
        Session::flash('info','something wrong ');
    }
    return redirect()->back();
   

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
    public function destroy($id)
    {
        $bloodbank= BloodBank::find($id);
        $bloodbank->delete();
        Session::flash('success','blood bank deleted');
        return redirect()->back();
    }
}
