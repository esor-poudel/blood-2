   @extends('layouts.master')
   @section ('content')

   <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
          @if(count($donor)>0)
          @foreach($donor as $d)
        <img src="{{asset('uploads/image/'.$d->image)}}" class="img-circle elevation-2" alt="User Image">
        @endforeach
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ strtoupper(auth::user()->name) }}</a>
      </div>
    </div>
    
    <!-- SidebarSearch Form -->
   
    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if($show_form==false)
            <li class="nav-item">
              <a href="{{ route('donar.show') }}" class="nav-link">
                <i class="fas fa-user-alt"></i>
                <p>Donor Form</p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{ route('profile.index') }}" class="nav-link">

                <i class="fas fa-cogs"></i>
                <p>Update Profile</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
           <i class="fas fa-power-off"></i>
           <p>
             {{ __('Logout') }}

           </p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST"
          style="display: none;">
          @csrf
          </form>









        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    
























   @if($show_form == true)
   @if(Auth::check())
    <div class="card">
      <div class="card-header" style="text-align: center;"> <h4>Donor form</h4></div>
    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

     <form id="create-channel-form" action="{{route('donars.store')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}
       @method('POST')

       <div class="form-group row justify-content-center">
         <div class="donar-avatar">
           <div onclick="document.getElementById('image').click()" class="donor-avatar-overlay">
             <svg id="Capa_1" fill="#fff" enable-background="new 0 0 512 512" height="50" viewBox="0 0 512 512"
               width="50" xmlns="http://www.w3.org/2000/svg">
               <g>
                 <path
                   d="m457 101h-100.188l-9.743-29.23c-6.136-18.405-23.293-30.77-42.692-30.77h-96.754c-19.399 0-36.556 12.365-42.691 30.77l-9.744 29.23h-24.188v-25c0-19.299-15.701-35-35-35h-20c-19.299 0-35 15.701-35 35v26.812c-23.568 6.208-41 27.698-41 53.188v260c0 30.327 24.673 55 55 55h402c30.327 0 55-24.673 55-55v-260c0-30.327-24.673-55-55-55zm-386-25c0-2.757 2.243-5 5-5h20c2.757 0 5 2.243 5 5v25h-30zm411 340c0 13.785-11.215 25-25 25h-402c-13.785 0-25-11.215-25-25v-260c0-13.785 11.215-25 25-25h111c6.456 0 12.188-4.131 14.23-10.257l13.162-39.486c2.046-6.135 7.764-10.257 14.231-10.257h96.754c6.467 0 12.186 4.122 14.23 10.256l13.162 39.487c2.043 6.126 7.775 10.257 14.231 10.257h111c13.785 0 25 11.215 25 25z" />
                 <circle cx="436" cy="176" r="15" />
                 <path
                   d="m106 161h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15s-6.716-15-15-15z" />
                 <g>
                   <path
                     d="m256 411c-74.439 0-135-60.561-135-135s60.561-135 135-135 135 60.561 135 135-60.561 135-135 135zm0-240c-57.897 0-105 47.103-105 105s47.103 105 105 105 105-47.103 105-105-47.103-105-105-105z" />
                 </g>
                 <g>
                   <path
                     d="m256 351c-41.355 0-75-33.645-75-75s33.645-75 75-75 75 33.645 75 75-33.645 75-75 75zm0-120c-24.813 0-45 20.187-45 45s20.187 45 45 45 45-20.187 45-45-20.187-45-45-45z" />
                 </g>
               </g>
             </svg>
           </div>

         </div>
       </div>
       {{-- <label for="image">upload image</label> --}}
       <input style="display: none" id="image" value="{{ old('image') }}" type="file" name="image">
       @error('image')
       <div class="alert-danger">{{$errors->first('image')}}</div>
       @enderror

       <div class="form-group">
         <label for="name">Full Name</label>
         <input type="text" name="name"  value="{{Auth::user()->name }}" class="form-control">
         @error('name')
         <div class="alert-danger">{{$errors->first('name')}}</div>
         @enderror
       </div>

       <div class="form-group">
         <label for="name">Date of Birth</label>
         <input type="date" name="birth" value="{{old('birth')}}" class="form-control">
         <small id="passwordHelpInline" class="text-muted">
           Must be 18 years old
         </small>
       </div>
       @error('birth')
       <div class="alert-danger">{{$errors->first('birth')}}</div>
       @enderror

       <div class="form-group">
         <label for="name">Blood Group</label>
         <select id="b_group" name="b_group">
           <option value="A+"> A+ </option>
           <option value="A-"> A- </option>
           <option value="B+"> B+ </option>
           <option value="B-"> B- </option>
           <option value="O+"> O+ </option>
           <option value="O-"> O- </option>
           <option value="AB+"> AB+ </option>
           <option value="AB-"> AB- </option>
         </select>
       </div>

      
       <div class="form-group">
         <label for="distict">Select your district</label>
         <select name="district" id="district" class="form-control">
           <option value="">select district</option>
           @foreach ($district as $key=>$value)
           <option value="{{$key}}">{{$value}}</option>

           @endforeach
         </select>
       </div>
       @error('district')
       <div class="alert-danger">{{$message}}</div>
       @enderror

       <div class="form-group">
         <label for="city">Select your city</label>
         <select name="city" id="city" class="form-control">
           <option value="">select city</option>
         </select>
       </div>
       @error('city')
       <div class="alert-danger">{{$message}}</div>
       @enderror

       <div class="form-group">
         <label for="name">Last Donate Date</label>
         <input type="date" name="d_date"  value="{{ old('d_date') }}" class="form-control">
         <small id="DonateHelpInline" class="text-muted">
           Must be 3 month older
         </small>
       </div>
       @error('d_date')
       <div class="alert-danger">{{$message}}</div>
       @enderror

       <div class="form-group">
         <label for="name">Phone Number</label>
         <input type="text" name="ph_number" value="{{old('ph_number')}}" class="form-control">
       </div>
       @error('ph_number')
       <div class="alert-danger">{{$message}}</div>
       @enderror
       <div id="mapid"></div>


       <div class="form-group">
         <div class="text-center">
           <button class="btn btn-success " type="submit">register</button>
         </div>
       </div>
       @endif
       @else
       <h1>Donate Blood Save Life</h1>
       @endif

































<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="p-3">
  <h5>Title</h5>
  <p>Sidebar content</p>
</div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

<script src="/js/app.js"></script>
</body>

</html>



       @endsection
       <script>
         <script>
    $(document).ready(function() {
      $('select[name="district"]').on('change', function() {
        var district_id = $(this).val();
        if (district_id) {
          console.log(district_id);
          $.ajax({
            url: '/searchCity/' + district_id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              console.log(data);
              $('select[name="city"]').empty();
              $.each(data, function(key, value) {
                $('select[name="city"]').append(
                  '<option value="' + key + '">' +
                  value + '</option>')
              });
            }
          });
        } else {
          $('select[name="city"]').empty();
        }
      });
    });
  </script>
       </script>