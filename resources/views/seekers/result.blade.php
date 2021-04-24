<!doctype html>
<html lang="en">

<head>
  <title>Easy Blood Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="/search/css/style.css">
  <style>
    #button
    {
      background-color: #ff1100;
    } 
    #image
    {
      height: 200%;
      width: 100%;
    }
    
  </style>
  {{-- <div class="container">
    <div class="row nav-row"> --}}
        <div  class="col-md-3 logo">
           <a href="{{ route('home.show') }}">  <img id="image" src="/assets/images/easyblood.png" alt=""></a>
        </div>
    </div>
  </div>
  {{-- <h1> <a href="{{ route('home.show') }}"> <img src="/assets/images/easyblood.png" alt=""> </a></h1> --}}
</head>

<body>
  
 
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-4">
          <h2 class="heading-section"></h2>
        </div>
      </div>
      
      <div class="row">
        
        <div>
          <form method="GET" action="{{route('donars.search')}}" class="form-inline" style="display:inline-block;"
            id='searchform'>

            <!-- department  !-->
            <select name="district" id="district" class="form-control form-control" style="display:inline-block">
              <option value="">District</option>

              @foreach ($district as $d)
              <option value="{{$d->id}}">{{$d->name}}</option>

              @endforeach
            </select>
            <!-- status  !-->
            <select id="city" class="form-control form-control" style="display:inline-block" name="city"
              style="height:40px; border:0px;">

            </select>
            
            <select id="blood"  class="form-control form-control" style="display:inline-block" name="blood"
              style="height:40px; border:0px;">
              
              <option value="A+"> A+ </option>
              <option value="A-"> A- </option>
              <option value="B+"> B+ </option>
              <option value="B-"> B- </option>
              <option value="O+"> O+ </option>
              <option value="O-"> O- </option>
              <option value="AB+"> AB+ </option>
              <option value="AB-"> AB- </option>

            </select>

            <button id="button" type="submit" class="btn btn-danger">Go</button>

          </form>
        </div>
        <div class="col-md-12">

          <h3 class="h5 mb-4 text-center">Donor List</h3>
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <th>Photo</th>
                  <th> Donor Name </th>
                  <th>Blood Group</th>
                  <th> District</th>
                  <th>City</th>
                  <th> Number</th>
                </tr>
              </thead>
              <tbody>

                @foreach($result as $results)
                <tr>
                  <td><img src="{{asset('uploads/image/'.$results->image)}}" width="140px" height="140px"
                      style="border-radius:50%;" alt="image"></td>
                     
                  <td> {{ strtoupper($results->name)}} </td>
                  <td>{{$results->b_group}}</td>
                  @foreach($district as $d)
                  @if($results->district_id===$d->id)
                  <td>{{strtoupper($d->name)}}</td>
                  @endif
                  @endforeach
                  @foreach($city as $c)
                  @if($results->city_id===$c->id)
                  <td>{{strtoupper($c->name)}}</td>
                  @endif
                  @endforeach
                  <td>{{$results->ph_number}}</td>
                </tr>

                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

  <script src="/search/js/jquery.min.js"></script>
  <script src="/search/js/popper.js"></script>
  <script src="/search/js/bootstrap.min.js"></script>
  <script src="/search/js/main.js"></script>
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

</body>

</html>