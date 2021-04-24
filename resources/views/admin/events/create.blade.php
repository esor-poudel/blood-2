@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header" style="text-align: center;"> <h4> Create a new event</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('events.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" value="{{old('name')}}"class="form-control">
                    </div>
                    

                    
                    <div class="form-group">
                    <label for="name">Start Date</label>
                    <input type="date" name="start_date" value="{{old('start_date')}}"class="form-control">
                    </div>
                   

                    <div class="form-group">
                    <label for="name">End Date</label>
                    <input type="date" name="end_date"  value="{{old('end_date')}}"class="form-control">
                    </div>
                    
                    
                    <div class="form-group">
                    <label for="name">phone number</label>
                    <input type="text" name="ph_number"  value="{{old('ph_number')}}" class="form-control">
                    </div>
                   
                    

                     
                    <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email"  value="{{old('email')}}" class="form-control">
                    </div>
                    

                      
                    <div class="form-group">
                    <label for="name">Location</label>
                    <input type="text" name="location"  value="{{old('location')}}" class="form-control">
                    </div>
                   

                     
                    <div class="form-group">
                    <label for="name">Venue</label>
                    <input type="text" name="venue"  value="{{old('venue')}}" class="form-control">
                    </div>
                    
                     
                    <div class="form-group">
                    <label for="name">Organizer</label>
                    <input type="text" name="organizer"  value="{{old('organizer')}}" class="form-control">
                    </div>
                    

                    <div class="form-group">
                    <div class="text-center">
                    <button class="btn btn-success " type="submit">Save event</button>
                    </div>
                    </div>

                    
                    </form>
                </div>
            </div>
        
@endsection
