@extends('layouts.app')


@section('content')
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">

            <thead>

            <th>

            Event name
            </th>
            <th>Start-Date</th>
            <th>End-Date</th>
            <th>
            Editing

            </th>

            <th>
            Deleting
            </th>
            </thead>
            <tbody>
           @if($events->count()>0)
           @foreach($events as $event)
            <tr>
            <td>
            {{$event->name}}

            </td>
            <td>{{date('F j,Y',strtotime($event->start_date))}}</td>
            <td>{{date('F j,Y',strtotime($event->end_date))}}</td>

            <td>
            <a href="{{route('events.edit',['event'=>$event->id])}}" class="btn btn-sm btn-info">
            edit
            </a>
            
            </td>

            <td>
            <form action="{{route('events.destroy',['event'=>$event->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('DELETE')}}
            
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            
            
            </form>
            </td>


            </tr>

            @endforeach
           @else
           <tr>
                <th colspan="5" class="text-center">No Events yet</th>
                </tr>
           @endif
            </tbody>

            </table>
</div>

</div>


@stop