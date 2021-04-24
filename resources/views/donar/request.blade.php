@extends('layouts.master')

@section('content')


@extends('layouts.master')
@section ('content')

<div class="sidebar">
 <!-- Sidebar user panel (optional) -->
 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
   <div class="image">
        
      @if($current_donor->count()>0)
       @foreach($current_donor as $current)
     <img src="{{asset('uploads/image/'.$current->image)}}" class="img-circle elevation-2" alt="User Image">
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
         @if($show_form==true)
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

 









     <div class="panel panel-default">
          <div class="panel-body">
               <table class="table table-hover">
     
                    <thead>
     
                         <th>Place Required</th>
                         <th>Contact Person</th>
                         <th>Number</th>
                         <th> Mail Id</th>
                         <th> Date When Required</th>
                         <th>Action</th>
                    </thead>
                    <tbody>
                         @if($request->count()>0)
     
                          @foreach($request as $r)
                         @foreach($donar as $d)
                         @if($r->blood_group==$d->b_group)
                         <tr>
                              <td>{{$r->place}}</td>
                              <td>{{$r->contact_name}}</td>
                              <td>{{$r->mobile_no}}</td>
                              <td>{{$r->email}}</td>
                              <td>{{date('F j,Y',strtotime($r->need_date))}}</td>
                              <td> <a class="btn btn-sm btn-info"
                                        href="{{route('need.accept',['id'=>$d->id,'need'=>$r->id])}}"><b>accept</b></a> </td>
     
                         </tr>
                         @endif
                         @endforeach
     
                         @endforeach 
     
                         @else
                         <tr>
                              <th colspan="5" class="text-center">No request yet</th>
                         </tr>
                         @endif
                    </tbody>
     
               </table>
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












