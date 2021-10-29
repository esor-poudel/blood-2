@extends('layouts.forum')

@section('content')

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












