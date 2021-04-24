@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">

            <thead>
                 <th>Photo</th>
            <th> Donar name </th>
            <th>Date-Of-birth</th>
            <th>last Donated</th>
            <th>Blood Group</th> 
            <th>District</th>
            <th>City</th>
             <th>Number</th>
            </thead>
            <tbody>
           @if($donars->count()>0)
           
           @foreach($donars as $donar)
            <tr>
            <td><img src="{{asset('uploads/image/'.$donar->image)}}"  width="140px" height="140px" style="border-radius:50%;" alt="image"></td>
            <td> {{$donar->name}} </td>
            <td>{{date('F j,Y',strtotime($donar->birth))}}</td>
            <td>{{date('F j,Y',strtotime($donar->d_date))}}</td>
            <td>{{$donar->b_group}}</td>
            @foreach($district as $d)
            @if($donar->district_id===$d->id)
            <td>{{$d->name}}</td>
            @endif
            @endforeach
            @foreach($city as $c)
            @if($donar->city_id===$c->id)
            <td>{{$c->name}}</td>
            @endif
            @endforeach
            <td>{{$donar->ph_number}}</td>

            <td><a href="{{route('donars.restore',['id'=>$donar->id])}}" class="btn btn-sm btn-info">
                                         accept
            </a>
            
            </td>

            <td>
            <form action="{{route('donars.destroy',['id'=>$donar->id,'user_id'=>$donar->user_id])}}" method="post">

            {{csrf_field()}}
         
            
            <button class="btn btn-sm btn-danger" type="submit">reject</button>
            
            
           
          


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