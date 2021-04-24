@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="text-align: center;">
        <h4>Add City</h4>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('city.create')}}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="district"> select district</label>
                <select name="district" id="district" class="form-control">
                    <option value="1">kathmandu</option>
                    <option value="2">bhaktapur</option>
                    <option value="3">lalitpur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Add city</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success " type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>

    @endsection