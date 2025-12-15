<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AirTravel</title>
    
    <link href="/welcome/img/AirTravelLogo.png" rel="icon">
<!--

Template 2095 Level

http://www.tooplate.com/view/2095-level

-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="/client/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="/client/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="/client/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/client/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/client/css/datepicker.css"/>
    <link rel="stylesheet" href="/client/css/tooplate-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>
            <div class="tm-top-bar" id="tm-top-bar">
                <!-- Top Navbar -->
                <div class="container">
                    <div class="row">
                        
                        <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                                <img src="/client/img/AirTravelLogo1.png" alt="Site logo">
                                <span style="font-family: 'Roboto', sans-serif; font-size: 24px; color: #ff9900; text-transform: uppercase; letter-spacing: 2px; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Welcome To AirTravel</span>
                        </a>

                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-4">Portfolio</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-5">Blog Entries</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-6">Contact Us</a>
                                  </li>
                                </ul>
                            </div>                            
                        </nav>            
                    </div>
                </div>
            </div>
            <div class="tm-section tm-bg-img" id="tm-section-1">
    <div class="tm-bg-white ie-container-width-fix-2">
        <div class="container ie-h-align-center-fix">
            <div class="row">
                <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                
                <form class="tm-search-form tm-section-pad-2" method="get" action="{{ route('search2') }}">
    <div class="form-row tm-search-form-row">
        <div class="form-group tm-form-element tm-form-element-50">
            <i class="fa fa-plane fa-2x tm-form-element-icon"></i>
            <select name="airport_depart" class="form-control tm-select" id="airport_depart" placeholder="Airport de depart...">
                <option value="">Airport de depart ...</option>
                <option value="TUN">Tunis Carthage (TUN)</option>
                <option value="ORY">France Paris (ORY)</option>
                <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                <option value="MJI">Libya Mitiga (MJI)</option>
                <option value="IST">Turkey Istanbul (IST)</option>
            </select>
        </div>
        <div class="form-group tm-form-element tm-form-element-50">
            <i class="fa fa-plane fa-2x tm-form-element-icon"></i>
            <select name="airport_arrive" class="form-control tm-select" id="airport_arrive" placeholder="Airport arrive...">
                <option value="">Airport d'arrivee ...</option>
                <option value="TUN">Tunis Carthage (TUN)</option>
                <option value="ORY">France Paris (ORY)</option>
                <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                <option value="MJI">Libya Mitiga (MJI)</option>
                <option value="IST">Turkey Istanbul (IST)</option>
            </select>
        </div>
        <div class="form-group tm-form-element tm-form-element-50">
            <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
            <input name="jour_depart" type="date" class="form-control" id="jour_depart" placeholder="Date d'expédition">
        </div>
        <div class="form-group tm-form-element tm-form-element-50">
    <input type="text" name="Nombre_de_tickets" class="form-control" id="Nombre_de_tickets" placeholder="Nombre de tickets">
    <i class="fa fa-2x fa-user tm-form-element-icon"></i>
</div>



        <div class="form-group tm-form-element tm-form-element-50">
            <button type="submit" class="btn btn-primary tm-btn-search">Check Availability</button>
        </div>
    </div>
    <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
        <p class="tm-margin-b-0">Explore the world and make lasting memories with AirTravel. Your dream vacation starts here</p>
        <a href="#" class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">Need Help?</a>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>

            
            <div class="tm-section-2">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="tm-section-title">We are here to help you?</h2>
                            <p class="tm-color-white tm-section-subtitle">Subscribe to get our newsletters</p>
                            <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe Newletters</a>
                        </div>                
                    </div>
                </div>        
            </div>
            
            <div class="tm-section tm-position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                  <polygon fill="#86B817" points="0,0 100,0 50,60"></polygon>                   
                </svg>
                <div class="container tm-pt-5 tm-pb-4">
                    <div class="row text-center">
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                                     <i class="fa fa-globe tm-fa-6x tm-color-primary tm-margin-b-20"></i>
                                        <h3 class="tm-color-primary tm-article-title-1">Explore seamless air travel with AirTravel</h3>
                                        <p>Swiftly book your flight tickets without hassle. Enjoy first-class flights, the latest model vehicles, and premium city tours. Benefit from our 24/7 service, ensuring a convenient and stress-free booking experience for your journey.</p>
                                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                        </article>

                        <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
    <i class="fa fa-plane tm-fa-6x tm-color-primary tm-margin-b-20"></i>
    <h3 class="tm-color-primary tm-article-title-1">Flight Reservations</h3>
    <p>Effortlessly reserve your flight tickets with us. Experience top-notch services and hassle-free booking procedures.</p>
    <p>Choose from a wide range of destinations and enjoy exclusive deals on your flights.</p>
    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>                            
</article>
<article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                           
    <i class="fa tm-fa-6x fa-clock-o tm-color-primary tm-margin-b-20"></i>
    <h3 class="tm-color-primary tm-article-title-1">24/7 Availability</h3>
    <p>Enjoy the convenience of 24/7 availability for booking your flights. Whether you're an early bird or a night owl, our services are always ready to assist you in planning your travel itinerary. With our round-the-clock support, you can book your flights at any time, knowing that assistance is just a click or a call away.</p>
    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>                           
</article>

                    </div>        
                </div>
            </div>
            

            <div class="tm-bg-video">
                <div class="overlay">
                    <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
                    <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
                </div>
                <video controls loop class="tmVideo">
                    <source src="/client/videos/video.mp4" type="video/mp4">
                    <source src="/client/videos/video.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
                <div class="tm-section tm-section-pad tm-bg-img" id="tm-section-5">                                                        
                    <div class="container ie-h-align-center-fix">
                        <div class="row tm-flex-align-center">
                            <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container">
                                <h2 class="text-uppercase tm-section-title-2">ASIA</h2>
                                <h3 class="tm-color-primary tm-font-semibold tm-section-subtitle-2">Singapore</h3>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3">
                                <div class="ml-auto tm-bg-white-shadow tm-pad tm-media-container">
                                    <article class="media tm-margin-b-20 tm-media-1">
                                        <img src="/client/img/img-03.jpg" alt="Image">
                                        <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                            <h3 class="tm-font-semibold tm-color-primary tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                            <p>Integer libero purus, consectetur vitae posuere quis, maximus id diam. Vivamus eget tellus ornare, sollicitudin quam id, dictum nulla. Phasellus finibus rhoncus justo, tempus eleifend neque dictum ac. Aenean metus leo, consectetur non. 
                                            <br><br>
											Etiam aliquam arcu at mauris consectetur scelerisque. Integer elementum justo in orci facilisis ultricies. Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida.</p>
                                        </div>                                
                                    </article>
                                    <article class="media tm-margin-b-20 tm-media-1">
                                        <img src="/client/img/img-04.jpg" alt="Image">
                                        <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                            <h3 class="tm-font-semibold tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                            <p>Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                            <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                        </div>                                
                                    </article>
                                    <article class="media tm-margin-b-20 tm-media-1">
                                        <img src="/client/img/img-05.jpg" alt="Image">
                                        <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                            <h3 class="tm-font-semibold tm-article-title-3">Faucibus dolor ligula nisl metus auctor aliquet</h3>
                                            <p>Nunc in felis aliquet metus luctus iaculis vel et nisi. Nulla venenatis nisl orci, laoreet ultricies massa tristique id.</p>
                                            <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                        </div>                                
                                    </article>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
            
            <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                            <div id="google-map"></div>        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                            <div class="tm-bg-white tm-p-4">
                                <form action="index.html" method="post" class="contact-form">
                                    <div class="form-group">
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject"  required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                                </form>
                            </div>                            
                        </div>
                    </div>        
                </div>
            </div>
            
            <footer class="tm-bg-dark-blue">
                <div class="container">
                    <div class="row">
                        <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                        Copyright &copy; <span class="tm-current-year">2018</span> Your Company
                        
                        - Design: Tooplate</p>        
                    </div>
                </div>                
            </footer>
        </div>
        
        <!-- load JS files -->
        <script src="/client/js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="/client/js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->       
        <script src="/client/js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
        <script src="/client/js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="/client/js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="/client/slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
<script>

/* Google map
------------------------------------------------*/
var map = '';
var center;

function initialize() {
    var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(13.7567928,100.5653741),
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

    google.maps.event.addDomListener(map, 'idle', function() {
      calculateCenter();
  });

    google.maps.event.addDomListener(window, 'resize', function() {
      map.setCenter(center);
  });
}

function calculateCenter() {
    center = map.getCenter();
}

function loadGoogleMap(){
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
    document.body.appendChild(script);
} 

function setCarousel() {
    
    if ($('.tm-article-carousel').hasClass('slick-initialized')) {
        $('.tm-article-carousel').slick('destroy');
    } 

    if($(window).width() < 438){
        // Slick carousel
        $('.tm-article-carousel').slick({
            infinite: false,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    }
    else {
     $('.tm-article-carousel').slick({
            infinite: false,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 1
        });   
    }
}

function setPageNav(){
    if($(window).width() > 991) {
        $('#tm-top-bar').singlePageNav({
            currentClass:'active',
            offset: 79
        });   
    }
    else {
        $('#tm-top-bar').singlePageNav({
            currentClass:'active',
            offset: 65
        });   
    }
}

function togglePlayPause() {
    vid = $('.tmVideo').get(0);

    if(vid.paused) {
        vid.play();
        $('.tm-btn-play').hide();
        $('.tm-btn-pause').show();
    }
    else {
        vid.pause();
        $('.tm-btn-play').show();
        $('.tm-btn-pause').hide();   
    }  
}

$(document).ready(function(){

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 100) {
            $(".tm-top-bar").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".tm-top-bar").removeClass("active");
        }
    });      

    // Google Map
    loadGoogleMap();  

    // Date Picker
    const pickerCheckIn = datepicker('#inputCheckIn');
    const pickerCheckOut = datepicker('#inputCheckOut');
    
    // Slick carousel
    setCarousel();
    setPageNav();

    $(window).resize(function() {
      setCarousel();
      setPageNav();
    });

    // Close navbar after clicked
    $('.nav-link').click(function(){
        $('#mainNav').removeClass('show');
    });

    // Control video
    $('.tm-btn-play').click(function() {
        togglePlayPause();                                      
    });

    $('.tm-btn-pause').click(function() {
        togglePlayPause();                                      
    });

    // Update the current year in copyright
    $('.tm-current-year').text(new Date().getFullYear());                           
});

</script>             


</body>
</html>

