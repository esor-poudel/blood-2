@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header" style="text-align: center;"> <h4> Update Setting</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('settings.update',['setting'=>$settings->id])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

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
                    <button class="btn btn-success " type="submit">update Setting</button>
                    </div>
                    </div>

                    
                    </form>
                </div>
            </div>
        
@endsection
