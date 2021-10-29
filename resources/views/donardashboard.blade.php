@extends('layouts.forum')

@section('content')


    <div class="card" style="justify-content">
        <div div class="card-header bg-danger">
            <h5>Welcome to Easy Blood Portal</h5>
        </div>

        <div id="card" class="card-body justify-content-center">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

        @if(!isset($donar))
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-header ">
                    Status
                </div>
                <div class="card-body">
                    Please Wait For Conformation
                </div>
            </div>
        </div>
        @elseif(isset($need) && isset($donar) && $month >=3)
        <div class="col-lg-3">
            <div class="card text-center" style="width: 40rem;">
                <div class="card-header ">
                  Blood Need <a class="btn btn-primary btn-sm" href="{{ route('need.request') }}">View Need</a>
                </div>
                @foreach($need as $bloodNeed)
                @if($bloodNeed->blood_group == $donar->b_group )
                <div class="card-body">
                        Name : {{ $bloodNeed->contact_name }} <br>
                        Contact Number: {{ $bloodNeed->mobile_no }}
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @elseif($month < 3)
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-header ">
                    Status
                </div>
                <div class="card-body">
                   Not Eligibile
                </div>
            </div>
        </div>
        @else
        <p> You are logged in</p>
        @endif
    @endsection
