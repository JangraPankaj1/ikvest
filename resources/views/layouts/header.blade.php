
@include('layouts.head')

 <header>
            <div class="back-of-hder">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-2">
                            <div class="heder-logo">
                                <a href="#">
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

                            <div class="main-admin-icon-only">
                            <a href="{{ route('login') }}"><img src="{{ asset('web-images/admin.svg') }}"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
