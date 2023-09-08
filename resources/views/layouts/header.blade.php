
@include('layouts.head')

 <header class=" @guest homes @endguest">
            <div class="back-of-hder ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-2">
                            <div class="heder-logo">
                                <a href="{{route('get.timeline.head')}}">
                                    <img src="{{ asset('images/IkVest-Logo.svg') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md col-sm-2 text-center">
                            <div class="nav-navigation">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon test">
                                        <img src="{{ asset('web-images/bars.svg') }}" class="bars"/>
                                        <img src="{{ asset('web-images/close-btn.svg') }}" class="close"/>
                                    </span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul>
                                        <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
                                        <li><a href="{{ route('about-us') }}" class="{{ Request::routeIs('about-us') ? 'active' : '' }}">About Us</a></li>
                                        <li><a href="{{ route('family-tree') }}" class="{{ Request::routeIs('family-tree') ? 'active' : '' }}">Family Tree</a></li>
                                        <li><a href="{{ route('investing') }}" class="{{ Request::routeIs('investing') ? 'active' : '' }}">Investing</a></li>
                                        <li><a href="{{ route('my-invest') }}" class="{{ Request::routeIs('my-invest') ? 'active' : '' }}">My Invest</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="admin-details">
                               
                            @auth

                                <div class="dropdown">
                                    <div class="drop-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <div class="admin-icon">
                                        @if(Auth::user()->image_path)
                                            <img src="{{ asset(Auth::user()->image_path) }}" alt="Profile Image" id="existing-image-preview">
                                            @else
                                            <img src="{{ asset('images/admin.svg') }}" alt="Default Profile Image" id="existing-image-preview">
                                            @endif
                                            
                                        </div>
                                        <div class="inr-wlcm-togl">
                                            <p>Welcome!</p>
                                            <b>{{ Auth::user()->f_name }}</b>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <div class="inr-wlcm-togl">
                                            <p>Welcome!</p>
                                            <b>{{ Auth::user()->f_name }}</b>
                                        </div>
                                        <li><a class="dropdown-item"  href="{{ route('logout') }}">Log Out</a></li>
                                        <li><a class="dropdown-item" href="{{ route('get.timeline.head') }}">Event</a></li>
                                                                               
                                    </ul>
                                </div>
                                @endauth
                                    
                                @guest
                                <a href="{{ route('login') }}"><img src="{{ asset('web-images/admin.svg') }}"/></a>
                                @endguest
                                
                            </div>
                           
                        </div>



                        <!-- <div class="col-lg-3 col-md-8 col-sm-8">

                            <div class="main-admin-icon-only">
                          

                                @auth
                                     Welcome, {{ Auth::user()->f_name }}
                                        <a class="custom-btn" href="{{ route('logout') }}"> Logout</a>

                                @endauth
                                @guest
                                <a href="{{ route('login') }}"><img src="{{ asset('web-images/admin.svg') }}"/></a>
                                @endguest





                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </header>
