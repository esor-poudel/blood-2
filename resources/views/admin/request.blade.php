@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">

            <thead>

            <th> Needed Blood Group </th>
            <th>Place Required</th>
            <th>Contact Person</th>
            <th>Number</th> 
            <th> Mail Id</th>
             <th> Date When Required</th>
             <th>status</th>
            </thead>
            <tbody>
           @if($request->count()>0)
           
           @foreach($request as $r)
            <tr>
            <td><b>{{$r->blood_group}}</b>  </td>
            <td>{{$r->place}}</td>
            <td>{{$r->contact_name}}</td>
            <td>{{$r->mobile_no}}</td>
            <td>{{$r->email}}</td>
            <td>{{$r->need_date}}</td>
            @if($r->status==0)
            <td> <b>open</b> </td>
            @else
            <td> <b>closed</b> </td>
            @endif
            </tr>

         @endforeach
       
           @else
           <tr>
                <th colspan="5" class="text-center">No request yet</th>
                </tr>
           @endif
            </tbody>

            </table>
</div>

</div>


@stop