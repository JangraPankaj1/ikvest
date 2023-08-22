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
                                 <h2>Welcome </h2>
                              
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
                                    <form action="{{ route('reset.password.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">


                                    <div class="sign-up-form">
                                        <label>New Password
                                            <input type="password" name="new_password" placeholder="Enter your Password" />
                                            @error("new_password")
                                                {{ $message }}
                                            @enderror
                                        </label>
                                        <label>Re-Enter New Password
                                            <input type="password" name="confirm_password" placeholder="Enter your confirm password" />
                                            @error("confirm_password")
                                                {{ $message }}
                                            @enderror
                                        </label>
                                       
                                    </div>
                                    <button type="submit" class="submit-btn">Submit</button>
                                    
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