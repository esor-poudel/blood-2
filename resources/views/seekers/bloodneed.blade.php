@extends('layouts.forum')
@section('content')

<div class="card">
    <div class="card-header" style="text-align: center;"> <h4>Post Blood Need</h4></div>
  <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

<form action="{{route('need.save')}}" method="POST">
    {{csrf_field()}}

    <div class="form-group">
        <label for="name">Blood Group</label>
        <select id="blood_group" name="blood_group">
            <option value="A+"> A+ </option>
            <option value="A-"> A- </option>
            <option value="B+"> B+ </option>
            <option value="B-"> B- </option>
            <option value="O+"> O+ </option>
            <option value="O-"> O- </option>
            <option value="AB+"> AB+ </option>
            <option value="AB-"> AB- </option>
        </select>
    </div>

    <div class="form-group">
        <label for="name">Place</label>
        <input type="text" name="place" placeholder="only available in kathmandu valley" value="{{ old('place') }}" class="form-control">
    </div>
    @error('place')
    <div class="alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label for="name">Contact Name</label>
        <input type="text" name="contact_name" value="{{ old('name') }}" class="form-control">
    </div>
    @error('contact_name')
    <div class="alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label for="name">Contact Mobile No.</label>
        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control">
    </div>
    @error('mobile_no')
    <div class="alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label for="name">Email.</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="this email is used as confirmation" class="form-control">
    </div>
    @error('email')
    <div class="alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label for="name">Date When Blood Required</label>
        <input type="date" name="need_date" value="{{ old('need_date') }}" class="form-control">
    </div>
    @error('need_date')
    <div class="alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <div class="text-center">
            <button class="btn btn-primary " type="submit">submit</button>
        </div>
        
</form>
  </div>
</div>


@endsection