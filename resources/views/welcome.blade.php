<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Easy Blood Portal</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    {!! toastr()->render() !!}
    <style>
        .dropbtn {
          background-color: #e72727;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }
        
        .dropbtn:hover, .dropbtn:focus {
          background-color: #dd2727;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          overflow: auto;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        
        .dropdown a:hover {background-color: #ddd;}
        
        .show {display: block;}
        </style>
</head>

<body>
        <header class="continer-fluid ">
            <div class="header-top">
                <div class="container">
                    <div class="row col-det">
                        <div class="col-lg-6 d-none d-lg-block">
                            <ul class="ulleft">
                                <li>
                                    <i class="far fa-envelope"></i>
                                   easybloodportal@gmail.com
                                    <span>|</span></li>
                                <li>
                                    <i class="far fa-clock"></i>
                                    Service Time : {{ $time }}</li>
                            </ul>
                        </div>
                       
                        <div class="col-lg-6 col-md-12">
                            <ul class="ulright">
                                <li>
                                    <i class="fas fa-user"></i>
                                    <a href="{{ route('login') }}" class="">login</a></li>
                                    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu-jk" class="header-bottom">
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-md-3 logo">
                             <img src="assets/images/easyblood.png" alt="">
                        </div>
                        <div class="col-md-9 nav-col">
                            <nav class="navbar navbar-expand-lg navbar-light">

                                <button
                                    class="navbar-toggler"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#navbarNav"
                                    aria-controls="navbarNav"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#">Home
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#about">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                           <a class="nav-link" href="#process">Donors</a>
                                       </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="#gallery">Gallery</a>
                                        </li>


                                        {{-- <li class="nav-item">
                                            <a class="nav-link" onclick="return confirm(' wants to know your location.');" href="{{ url('ipaddress') }}">search</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="#blog">Events</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact">Contact US</a>
                                        </li>
                                        <form action="{{route('donars.search')}}" method="GET">
                                           
                                                             
                                    <div class="form-group">
                                       
                                       <select onclick="myFunction()" id="b_group" name="search">
                                        <option value="" disabled selected>Blood Group</option>
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
                                        <div class="text-center">
                                        <button id="button" class="btn btn-success"  type="submit">Search</button>
                                        </div>
                
                                        </form>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </header>

        
        
        
    <!-- ################# Slider Starts Here#######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slide-02.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft">Blood Donation Costs You Nothing, But It Can Mean The World To Someone In Need <br>
                            Blood Donation Is A Great Act Of Kindness
                        </p>

                        <div class=" vbh">

                          <a class="btn btn-success  bounceInUp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Book Need</a>
                            <div a href="#contact" class="btn btn-success  bounceInUp"> Contact US </a></div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/slider/slide-03.jpg" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft"> You Are Not Useless, Know Your Worth By Donating Blood! <br>
                            Donate Blood And Be The Reason For A Smile On Someone’s Face</p>

                        <div class=" vbh">

                            <a class="btn btn-success  bounceInUp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Book Need</a>
                            <a href="{{ route('register') }}" class="btn btn-danger  bounceInUp"> Donate Now </a>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    
    <!--*************** About Us Starts Here ***************-->
   <section id="about" class="contianer-fluid about-us">
       <div class="container">
           <div class="row session-title">
               <h2>About Us</h2>
               
           </div>
            <div class="row">
                <div class="col-md-6 text">
                    <h2>About Easy Blood Portal</h2>
                    <p>The basic building aim is to
                        provide blood donation service in the Kathmandu valley. Easy blood portal is a
                        browser-based system that is designed to process store retrieve and analyze information
                        concerned with the administrative and inventory management</p>
                    <p> This project aims to
                        maintaining all the information pertaining to blood donors, different blood groups
                        available and help them manage in a better way</p>
                    <p>This project aims to provide
                        transparency in the field, make the process of obtaining blood hassle free and corruption
                        free and make the system effective.</p>
                    <p>The main aim of this project
                        will therefore be to find more effective ways of managing the database of blood donors
                        and establish a forum for people connected to potential blood donors in the region</p>
                </div>
                <div class="col-md-6 image">
                    <img src="assets/images/about.jpg" alt="">
                </div>
            </div>
       </div>
   </section>
    
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Post Blood Need</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form" action="{{route('need.save')}}" method="POST">
                {{csrf_field()}}
            
            
            <div class="form-group">
                <label for="name">Blood Group</label>
                <select id="blood_group" name="blood_group">
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
                <label for="name">Place</label>
                <input type="text" id="place" value="{{ old('place') }}" required name="place" class="form-control">
                @error('place')
                <div class="alert-danger">{{$errors->first('place')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Contact Name</label>
                <input type="text" id="contact_name" value="{{ old('contact_name') }}" required name="contact_name" class="form-control">
                @error('contact_name')
                <div class="alert-danger">{{$errors->first('contact_name')}}</div>
                @enderror
             </div>
             <div class="form-group">
                <label for="name">Contact Mobile No.</label>
                <input type="text" id="mobile_no" value="{{ old('mobile_no') }}" name="mobile_no" class="form-control">
                @error('mobile_no')
                <div class="alert-danger">{{$errors->first('mobile_no')}}</div>
                @enderror
             </div>
             <div class="form-group">
                <label for="name">Email.</label>
                <input type="email" id="email" name="email" placeholder="required for conformation" class="form-control">
                @error('email')
                <div class="alert-danger">{{$errors->first('email')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Date When Blood Required</label>
                <input type="date" id="need_date" value="{{ old('need_date') }}" name="need_date" class="form-control">
                @error('need_date')
                <div class="alert-danger">{{$errors->first('need_date')}}</div>
                @enderror
            </div>
        
        </form>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" onclick="document.getElementById('form').submit();"  class="btn btn-primary">post need</button>
        </div>
    
      </div>
    </div>
  </div>



  
    
      <!-- ################# Gallery Start Here #######################--->
     
   
    
    
    
     <!-- ################# Donation Process Start Here #######################--->
     
     <section id="process" class="donation-care">
         <div class="container">
           <div class="row session-title">
               <h2>Donors Lists</h2>
               
           </div>
            <div class="row">
                @foreach($donor as $donors)
                 <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                     <img src="{{asset('uploads/image/'.$donors->image)}}" alt=""> 
                     <br>
                     <p> Name: {{ strtoupper($donors->name) }}</p>
                     <p>Blood Group: {{ $donors->b_group }}</p>
                     <p>Contact Number: {{ $donors->ph_number }}</p>
                     <p></p>
                    
                     </div>
                 </div>
                 @endforeach
                
     </section>
     
     <div id="gallery" class="gallery container-fluid">
        <div class="container">
            <div class="row session-title">
                <h2>Checkout Our Gallery</h2>
            </div>
            <div class="gallery-row row">
                    <div id="gg-screen"></div>
                    <div class="gg-box">
                            <div class="gg-element">
                                <img src="assets/images/gallery/g1.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g2.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g3.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g4.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g5.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g6.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g7.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g8.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g9.jpg">
                            </div>
                            <div class="gg-element">
                                <img src="assets/images/gallery/g10.jpg">
                            </div>
                            
                            
                          </div>
            </div>
        </div>
    </div>
     
     
         <!--################### Our Blog Starts Here #######################--->
        <div id="blog" class="blog-container contaienr-fluid">
            <div class="container">
                <div class="session-title row">
                  <h2>Latest Events</h2>
                  <p>Can I help organise blood donation events?</p>
                </div>
                <div class="row news-row">
                   
                   @foreach ($event as $e)
                       
                   <div class="col-md-6">
                    <div class="news-card">
                        {{-- <div class="image">
                            <img src="assets/images/blog/blog_01.jpg" alt="">
                        </div> --}}
                        <div class="detail">
                            <h2> {{ $e->name }}</h2>
                            {{-- <h3>Name: {{ $e->name }}</h3> --}}
                            <span>Location: {{ $e->location }}</span>
                            <p class="footp">
                                Organizer:{{ $e->organizer }} <span>/</span>
                               Start-Date {{ $e->start_date }} <span>/</span>
                               End-Date:{{ $e->end_date }}<span>/</span>
                               {{ $e->ph_number }}<span>/</span>
                            </p>
                        </div>
                    </div>
                </div>
                    @endforeach
                </div>
                    
     
     

   
      <!--*************** Footer  Starts Here *************** -->
    <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="row content-ro">
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2>Contact Informatins</h2>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        @foreach($setting as $s)
                        <div class="detail">
                            <p>{{ $s->address }} <br>kausaltar, bhaktapur</p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="detail">
                            <p>{{ $s->email }}<br>easyblood@gmail.com</p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="detail">
                            <p>{{ $s->contact_number }} <br>9842196350</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                   <div class="row no-margin mt-2">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>Home</li>
                        <li>About Us</li>
                        <li>Contacts</li>
                        <li>Pricing</li>
                        <li>Gallery</li>
                        <li>features</li>

                    </ul>
                    </div>
                   <div class="row no-margin mt-1">
                       <h2 class="m-t-2">More Products</h2>
                     <ul>
                        <li>Advanced Forum Discussion</li>
                        <li>BSCCSIT</li>
                        <li>Easy Blood Portal</li>
                        <li>Ambition College</li>


                    </ul>
                   </div>

                </div>
                
                <div class="col-lg-4 col-md-12 footer-form">
                    <form action="{{ route('message.post') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('POST')
                    <div class="form-card">
                        <div class="form-title">
                            <h4>Message</h4>
                        </div>
                        <div class="form-body">
                            <input type="text" placeholder="Enter Name" name="name" required class="form-control">
                            <input type="text" placeholder="Enter Mobile no" name="number" required class="form-control">
                            <input type="text" placeholder="Enter Email Address" name="email"  class="form-control">
                            <input type="text" placeholder="Your Message" name="message" required class="form-control">
                            <button type="submit" class="btn btn-sm btn-primary w-100">Send Request</button>
                        </div>
                    </div>
               
                </div>
            </form>
            </div>

            <div class="footer-copy">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <p>Copyright © <a href="https://www.easybloodportal.com">easybloodportal.com</a> | All right reserved.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 socila-link">
                        <ul>
                            <li><a><i class="fab fa-github"></i></a></li>
                            <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li><a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    
</body>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/js/script.js"></script>
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
                <script type="text/javascript">
            @if (count($errors) > 0)
                $('#exampleModal').modal('show');
            @endif
            </script>
            <script>
                function myFunction() {
                   
                    
                  alert("want to know your location");
                }
                </script>
           
    