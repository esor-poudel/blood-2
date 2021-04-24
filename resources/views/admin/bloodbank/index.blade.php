@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">
    <thead>

        <th>name</th>
        <th>Available Blood</th>
        <th>Amount</th>
        <th>Action</th>
    </thead>
    
    <tbody>
        @foreach($bloodbank as $bloodbanks)
         <tr>
         <td> {{$bloodbanks->name}} </td>
         <td>{{$bloodbanks->blood_type}}</td>
         <td>{{$bloodbanks->blood_pint}}</td>
         {{-- <td><a href="{{route('bloodbanks.edit',['bloodbank'=>$bloodbanks->id])}}"class="btn btn-sm btn-info">modify</a></td> --}}
       <td> <form action="{{route('bloodbanks.destroy',['bloodbank'=>$bloodbanks->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('DELETE')}}
            
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            
            
            </form></td>
         </tr>
         @endforeach
         </tbody>
        </table>
          
</div>

</div>


@stop