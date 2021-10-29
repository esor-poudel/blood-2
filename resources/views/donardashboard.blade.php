@extends('layouts.master')

@section('content')


<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('uploads/image/'.$donor->image)}}" class="img-circle elevation-2" alt="User Image">
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
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            @if($existing_donar==true)
            <li class="nav-item">
              <a href="{{ route('donar.show') }}" class="nav-link ">
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
            <div class="card text-center">
                <div class="card-header ">
                  Blood Need
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
