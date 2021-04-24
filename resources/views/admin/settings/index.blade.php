@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">

            <thead>

            <th>

           Email
            </th>
            <th>Contact-Number</th>
            <th>Address</th>
            <th>
            Update

            </th>
            <th>
            Delete

            </th>
            </thead>

            <tbody>
           @if($settings->count()>0)
           @foreach($settings as $setting)
            <tr>
            <td>
            {{$setting->email}}

            </td>
            <td>{{$setting->contact_number}}</td>
            <td>{{$setting->address}}</td>

            <td>
            <a href="{{route('settings.edit',['id'=>$setting->id])}}" class="btn btn-sm btn-info">
            edit
            </a>
            
            </td>

            <td>
            <form action="{{route('settings.destroy',['setting'=>$setting->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('DELETE')}}
            
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            
            
            </form>
            </td>

            
            
            </form>


            </tr>

            @endforeach
           @else
           <tr>
                <th colspan="5" class="text-center">No setting yet</th>
                </tr>
           @endif
            </tbody>

            </table>
</div>

</div>


@stop