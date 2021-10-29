@extends('layouts.app')
@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">
    <thead>
        <th>Image</th>
        <th> Donar Information </th>
        <th>Last Donation</th>
        <th>Location</th>
         <th>Number</th>
      
        </thead>
        <tbody>
       @if($donars->count()>0)
       @foreach($donars as $donar)
        <tr>
        <td><img src="{{asset('uploads/image/'.$donar->image)}}"  width="140px" height="140px" style="border-radius:50%;" alt="image"></td>
        <td> <b>Name</b>: {{$donar->name}} <br>
             <b>DOB</b>:{{ $donar->birth }} <br>
             <b>B Group</b>: {{$donar->b_group}}</td>
        <td>{{$donar->d_date}}</td>
         <td>  <b>District</b> : {{ $donar->district->name }}<br>
               <b>City</b>:{{ $donar->district->city->name }}
        <td> {{$donar->ph_number}}</td>

        </tr>
     @endforeach

           @else
           <tr>
                <th colspan="5" class="text-center">No Donars yet</th>
                </tr>
           @endif
            </tbody>

            </table>
</div>

</div>


@stop
