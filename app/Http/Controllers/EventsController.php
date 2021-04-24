<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use carbon\Carbon;
use Session;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$autodelete= Event::where('end_date','<',Carbon::now())->delete();
        return view('admin.events.index')->with('events',Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd(request()->all());
      $this->validate($request,[
                'name'=>'required',
                'email'=>'required|email',
                'start_date'=>'required|date_format:Y-m-d|after_or_equal:today',
                'end_date'=>'required|date_format:Y-m-d|after_or_equal:start_date',
                'ph_number'=>'required',
                'venue'=>'required',
                'organizer'=>'required',
                'location'=>'required'
      ],
    [
        'start_date.after'=>'provide valid start date'
    ]);

      //  dd($eventdata);

        $event= new Event;
        $event->name= $request->name;
        $event->email=$request->email;
        $event->start_date=$request->start_date;
        $event->end_date=$request->end_date;
        $event->ph_number= $request->ph_number;
        $event->venue= $request->venue;
        $event->organizer= $request->organizer;
        $event->location= $request->location;

        $event->save();
        Session::flash('success','event created');
        return redirect()->route('events.index');


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
        $event = Event::find($id);
        return view('admin.events.edit')->with('events',$event);
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
                'start_date'=>'required|date_format:Y-m-d',
                'end_date'=>'required|date_format:Y-m-d',
                'name'=>'required'
        ]);
        $eventdata= Event::find($id);
        $eventdata->start_date= $request->start_date;
        $eventdata->end_date=$request->end_date;
        $eventdata->name=$request->name;
        $eventdata->save();
        Session::flash('success','event updated');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event= Event::find($id);
        $event->delete();
        Session::flash('success','event deleted');
        return redirect()->back();
    }
    public function UocomingEvents()
    {

    }
}
