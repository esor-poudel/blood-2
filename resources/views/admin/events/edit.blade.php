@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header" style="text-align: center;"> <h4> update event</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('events.update',['event'=>$events->id])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" class="form-control">
                    </div>

                    
                    <div class="form-group">
                    <label for="name">Start Date</label>
                    <input type="date" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="name">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                    </div>


                    <div class="form-group">
                    <div class="text-center">
                    <button class="btn btn-success " type="submit">update event</button>
                    </div>
                    </div>

                    
                    </form>
                </div>
            </div>
        
@endsection
