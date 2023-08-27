
@extends('layouts.without-header')
@section('main-content-without-header')

    <div class="wrapper">
        <section class="Welcome">
            <div class="bck-img-inr">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="lft-side-login">
                                <div class="inr-join-us">
                                    <h1>Come join us,</h1>
                                    <h4>to share your family tree and history.</h4>
                                    <div class="inr-plus-login">
                                        <h2>Plus,</h2>
                                        <h4>you will have an option to learn about investing
                                            for your family and your own future.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="right-login-form">
                                <img src="{{ asset('images/IkVest-Logo.svg') }} " class="icon-logo-top" />
                                <h2>Welcome Admin</h2>
                              
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session()->has("message"))
                                        <div class="alert alert-success">
                                            {{ session()->get("message") }}
                                        </div>
                                    @endif
                                <form class="formLogin" action="{{ route('login.post') }}" method="post">
                                    @csrf

                                    <div class="sign-up-form">
                                        <label>Email
                                            <input type="Email" name="email" placeholder="Enter your email" value="{{ old('email') }}" />
                                        </label>
                                        <label>Password
                                            <input type="password" name="password" placeholder="Enter your password" />
                                        </label>
                                        <div class="check-in-pass">
                                            <label><input type="checkbox" name="checkbox"> Remember me</label>
                                            <a href="{{ route('forget.password') }}">Forgot password?</a>
                                        </div>
                                    </div>
                                    <button type="submit" class="submit-btn">Sign in</button>
                                        <div class="or-google">
                                            <p>or</p>
                                            <a  href="{{ url('auth/facebook') }}">
                                                <img src=" {{ asset('images/Facebook.svg') }}" />

                                            </a>

                                            <a href="{{ route('auth.google') }}" id="google-login-link">
                                                <img src="{{ asset('images/google.svg') }}" data-text="signup_with" style="margin-left: 3em;" alt="Signup with Google" id="google-login-button" disabled>
                                            </a>
                                        </div>
                                        <div class="mt-5">
                                        <p>Already have an account? <a href="{{ route('register') }}" class="create_now">Register</a></p>
                                    </div>
                                  </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection
