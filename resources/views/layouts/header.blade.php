<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/style.css')}}" />
    <title>IKVest</title>
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('js') !!}"></script>
    <link href="{!! asset('css/responsive-style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/webstyle.css') !!}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</head>

<body>
  <!------------------for header --------------------->
  <header>
            <div class="back-of-hder">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="heder-logo">
                                <a href="#">
                                    
                                    <img src="{{ asset('images/IkVest-Logo.svg') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 text-center">
                            <div class="nav-navigation">
                                <ul>
                                    <li><a href="#" class="active">Home</a></li>
                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    <li><a href="{{ route('family-tree') }}">Family Tree</a></li>
                                    <li><a href="{{ route('investing') }} ">Investing</a></li>
                                    <li><a href="{{ route('my-invest') }}">My ikvest</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="admin-details">
                                <div class="icons-notification">
                                    <a href="#">
                                        <img src="{{ asset('web-images/loudspeaker.svg') }}" />
                                    </a>
                                    <a href="#">
                                       <img src="{{ asset('web-images/notifications.svg') }}" />

                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('web-images/chat.svg') }}" />
                                    </a>
                                </div>
                                <ul>
                                   <li><a href="{{ route('register') }}">Register</a> </li>
                                   <li> <a href="{{ route('login') }}">login</a></li>
                                 </ul>  
                                <div class="dropdown">
                                    <!-- <div class="drop-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"> -->
                                        <!-- <div class="admin-icon">
                                            <img src="{{ asset('web-images/admin.png')}}" />
                                        </div> -->
                                      
                                        <!-- <div class="inr-wlcm-togl">
                                            <p>Welcome!</p>
                                            <b>Ian Knight</b>
                                        </div> -->
                                    </div>
                                    <!-- <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        </body>
</html>