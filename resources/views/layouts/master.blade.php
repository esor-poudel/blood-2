<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donor Dashboard</title>

  <link rel="stylesheet" href="/css/app.css">
  {!! Toastr::render() !!}
  {!! toastr()->render() !!}
  <style>
    #card {
  display: flex;
  justify-content: center;
  flex-direction: row;
}
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

  
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
     
      <a href="{{ route('dashboard') }}" class="brand-link">
   
        <span class="brand-text font-weight-light">Easy Blood Portal</span>
      </a>
    @yield('content')
    
      {{-- <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth::user()->name }}</a>
          </div>
        </div>
        
      
        <nav class="mt-2">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               
                <li class="nav-item">
                  <a href="{{ route('donar.show') }}" class="nav-link active">
                    <i class="fas fa-user-alt"></i>
                    <p>Donor Form</p>
                  </a>
                </li>
               
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
     
      </div>
    
    </aside>

  
    <div class="content-wrapper">

  
   
    </div>

   
  </div>
  
  </div>
  </div>
 
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
 
  <script src="/js/app.js"></script> --}}
</body>

</html>

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
