<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
// use App\Donar;
use App\Notifications\NewDonarAdded;
use App\Need;
use Carbon\Carbon;
use App\User;
use App\City;
use App\District;
use App\Donar;
use App\Enquiry;
use Auth;
use Session;

class DonarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donar = Donar::where('approved', 0)->get();
        $district = District::all();
        $city = City::all();
        return view('admin.donars.unregisteredDonar')->with('donars', $donar)
            ->with('city', $city)
            ->with('district', $district);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = User::where('admin', 1)->first();
        $notification = Donar::where('user_id', auth::id());


        $this->validate($request,[
                'name' => 'required',
                'district' => 'required',
                'image' => 'required|image',
                'city' => 'required',
                'ph_number' => 'required|min:10|max:10',
                'b_group' => 'required',
                'birth' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18),
                'd_date' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subMonth(3),
            ],
            [
                'birth.before' => 'you must be 18 years old',
                'd_date.before' => 'you must wait 3 month before next donation'

            ]
        );
        $donar = new Donar;
        $donar->name = $request->name;
        $donar->ph_number = $request->ph_number;
        $donar->b_group = $request->b_group;
        $donar->district_id = $request->district;
        $donar->city_id = $request->city;
        $donar->birth = $request->birth;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $donar->image = $filename;
        }
        $donar->d_date = $request->d_date;
        $donar->user_id = Auth::id();
        $donar->save();
        $admin->notify(new NewDonarAdded($notification));
        Session::flash('success', 'register completed');
        return redirect()->route('dashboard');
    }

    public function restore($id)
    {
        $donar = Donar::find($id);
        $donar->approved = 1;
        $donar->save();
        Session::flash('success', 'Donar Approved');
        return redirect()->back();
    }

    public function kill($id, $user_id)
    {
        $donar = Donar::find($id);
        $user = User::find($user_id);
        $donar->delete();
        $user->delete();
        Session::flash('success', 'Donar Deleted successfully');
        return redirect()->back();
    }
    public function alldonar()
    {

        $donar_address = Donar::where('approved', 1)->pluck('district_id');
        $district = District::all();
        $city = City::all();
        $donars = Donar::where('approved', 1)->get();
        return view('admin.donars.registeredDonar')->with('donars', $donars)
            ->with('district', $district)->with('address', $donar_address)->with('city', $city);
    }

    public function BecomeDonar()
    {
        $existing_donors = Donar::all()->pluck('user_id')->toArray();
        $show_form = true;
        $donor= Donar::where('user_id',auth::id())->get();
        if (in_array(auth::id(), $existing_donors)) {
            $show_form = false;
        }

        // $approved_status = Donar::withTrashed()->find(auth::id())->first();
        // $current_donar =  Donar::find(auth::id())->first();
        // dd($current_donar);
        // $donar= Donar::withTrashed()->get();

        $district = District::all()->pluck('name', 'id');
       
      
        

        return view('donar.donars.create')
            //  ->with('current_donar',$current_donar)
            ->with('show_form', $show_form)
            ->with('district', $district)
            ->with('donor',$donor);
    }

    public function getcity($id)
    {
        $city = City::where('district_id', $id)->pluck('name', 'id');
        return json_encode($city);
    }
    public function enquiry()
    {
        $enquiry= Enquiry::all();
        return view ('admin.enquiry.index',compact('enquiry'));
    }
}
