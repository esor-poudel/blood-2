@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header" style="text-align: center;"> <h4> Add new Blood Bank</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('bloodbanks.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="name">blood bank name</label>
                        <input type="text" name="name" value="{{old('name')}}"class="form-control">
                        </div>

                        <label for="blood_type">Available Blood</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="A+">
                            <label class="form-check-label" for="A+">A+</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="B+">
                            <label class="form-check-label" for="B+">B+</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="O+">
                            <label class="form-check-label" for="O+">O+</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="O-">
                            <label class="form-check-label" for="O-">O-</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="AB+">
                            <label class="form-check-label" for="AB+">AB+</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_type[]" value="AB-">
                            <label class="form-check-label" for="AB-">AB-</label>
                          </div>

                          
                    <div class="form-group">
                        <div class="text-center">
                        <button class="btn btn-success " type="submit">Save</button>
                        </div>
                        </div>
    



                </div>
            </div>
        
@endsection
