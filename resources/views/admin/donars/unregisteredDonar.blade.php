@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table width="100%" class="table table-striped table-lightfont datatable-responsive">

            <thead>
            <th>Image</th>
            <th> Donar Information </th>
            <th>Last Donation</th>
            <th>Location</th>
             <th>Number</th>
             <th>Action</th>
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
            <td><a href="{{route('donars.restore',['id'=>$donar->id])}}" class="btn btn-sm btn-info"> accept </a>
            <form action="{{route('donars.destroy',['id'=>$donar->id,'user_id'=>$donar->user_id])}}" method="post">
            {{csrf_field()}}
            <button class="btn btn-sm btn-danger mt-2" type="submit">reject</button></form></td>
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
