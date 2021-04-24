@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header" style="text-align: center;"> <h4> Create Setting</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if($settings->count()<1)
                    <form action="{{route('settings.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" value="{{old('email')}}"class="form-control">
                    </div>
                    

                    <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="text" name="contact_number" value="{{old('contact_number')}}"class="form-control">
                    </div>
                    

                    <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" value="{{old('address')}}"class="form-control">
                    </div>
                    
                    
                    <div class="form-group">
                    <div class="text-center">
                    <button class="btn btn-success " type="submit">Save setting</button>
                    </div>
                    </div>
                    @else
                   <h1 style=" text-align: center;">cannot create more setting</h1>
                    @endif

            

                   
                   
                    
                    </form>
                </div>
            </div>
        
@endsection
