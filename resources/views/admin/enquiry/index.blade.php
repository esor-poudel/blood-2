@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Message</th>
            </thead>
            <tbody>
                @foreach ($enquiry as $e)
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->number }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->message }}</td>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@stop