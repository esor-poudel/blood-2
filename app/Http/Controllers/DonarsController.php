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
use App\Http\Requests\Donor\DonorRequest;
use Auth;
use Session;

class DonarsController extends Controller
{
    public function __construct(Donar $donor, District $district, City $city)
    {
        $this->donor = $donor;
        $this->district = $district;
        $this->city = $city;
        $this->user = new User();
    }
    public function index()
    {
        $donar =$this->donor->where('approved', 0)->get();
        return view('admin.donars.unregisteredDonar')->with('donars', $donar);
    }

    public function store(DonorRequest $request)
    {
        $admin = $this->user->where('admin', 1)->first();
        $notification =$this->donor->where('user_id', auth::id());
        $data['name'] = $request->name;
        $data['ph_number'] = $request->ph_number;
        $data['b_group'] = $request->b_group;
        $data['district_id'] = $request->district;
        $data['city_id'] = $request->city;
        $data['birth'] = $request->birth;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image', $filename);
            $data['image'] = $filename;
        }
        $data['d_date']= $request->d_date;
        $data['user_id'] = Auth::id();
        $this->donor->create($data);
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
        $donars =$this->donor->where('approved', 1)->with('district.city')->get();
        return view('admin.donars.registeredDonar')->with('donars', $donars);
    }

    public function BecomeDonar()
    {
        $existing_donors = Donar::all()->pluck('user_id')->toArray();
        $show_form = true;
        $donor=$this->donor->where('user_id',auth::id())->get();
        if (in_array(auth::id(), $existing_donors)) {
            $show_form = false;
        }

        $district = District::all()->pluck('name', 'id');
        return view('donar.donars.create')
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
