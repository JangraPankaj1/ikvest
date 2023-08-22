<!DOCTYPE html>
<html>
<head>
    <title>IKVest</title>

    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('js') !!}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{!! asset('css/responsive-style.css') !!}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <section>
            <div class="bck-img-inr">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

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
                                <h2>Sign up</h2>
                                <form id = "thisForm" class="formRegister" action="{{ route('register.post') }}" method="post">
                                    @csrf

                                    <div class="sign-up-form">
                                        <label>First Name
                                            <input type="text"  placeholder="First Name" name="f_name" class="form-control"
                                                value="{{ old('f_name') }}" />
                                            <div class="error">
                                                @error('f_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>   
                                        </label>

                                        <label>Last Name
                                            <input type="text" placeholder="Last Name" name="l_name" class="form-control"
                                                value="{{ old('l_name') }}" />
                                            <div class="error">
                                                @error('l_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>   
                                        </label>
                                        <label>Email
                                            <input type="text" name="email" placeholder="Email Address" class="form-control"
                                                value="{{ old('email') }}" />
                                            <div class="error">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </label>
                                        <div class="apperance-icon">
                                            <label>Role</label>
                                            <select name="role" id="role"   class="form-control">
                                                <option value="{{ old('role') }}">Select Role</option>
                                                <option value="2">Head Family </option>
                                                <option value="3">Family Members</option>
                                            </select>
                                        <div class="error">
                                            @error('role')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        </div>
                                        <label>Password
                                            <input type="password" class="form-control" name="password" placeholder="Password" />
                                                <div class="error">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                        </label>
                                        <label>Confirm Password
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="Confirm Password" />
                                            <div class="error">
                                                @error('confirm_password')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </label>
                                    </div>
                                    <button type="submit" class="submit-btn">Create My Account</button>
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
                                        <p>Already have an account? <a href="{{ route('login') }}" class="create_now">Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>