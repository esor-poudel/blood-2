@extends('layouts.master')

@section('content')


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
    
            @if($existing_donar==false)
            @if($current_donar_status->approved==1)
            
                <div class="card text-center" style="width: 15rem;">
                    <div class="card-header bg-danger">
                        Blood Needed
                    </div>
                   
                    <div class="card-body">
                        @if(isset($need)==null)
                    
                        @elseif($donar==null)
                   <h3><p class="text-danger">Not Eligible</p></h3> 
                    </div>
                    @else
                    <div class="card-body">
                        @foreach($need as $n)
    
                        @if($donar->b_group == $n->blood_group)
    
                        {{$n->contact_name}} {{$n->mobile_no}}<br>
    
                        @endif
    
                        @endforeach
    
                    </div>
                </div>
    
                    <div class="card-footer text-muted">
                        <a href="{{route('donar.request.view')}}" class="btn btn-danger">view</a>
                    </div>
                    @endif
        </div>
    
                <br><br>
    
                @else
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-header ">
                            status
                        </div>
                        <div class="card-body">
                            please wait for conformation
                        </div>
                    </div>
                </div>
    
                @endif
                @else
                <p> You are logged in</p>
                @endif
    
            </div>
        </div>








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