<!DOCTYPE html>
<html>
<head>
    <title>IKVest</title>
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('js') !!}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="{!! asset('css/responsive-style.css') !!}" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <section class="forget">
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
                                <img src="images/IkVest-Logo.svg" class="icon-logo-top" />
                                <h2>Forgot Password</h2>
                                <p>Enter your registered Email ID and we will send you a link to change your password
                                </p>
                                
                                <div class="card-body">
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

                                    <form id ="thisForm" action="{{ route('forget.password.post') }}" method="post">
                                        @csrf
                                    <div class="sign-up-form">
                                        <label>Email
                                            <input type="Email" name="email" placeholder="Enter your Email" />
                                        </label>
                                    </div>
                                    <button type="submit" class="submit-btn">Verify</button>
                                    
                                    <div class="">
                                        <p>Don't have an account yet? <a href="{{ route('register') }}" class="create_now">Create
                                                Now</a></p>
                                    </div>
                                 </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
@push("js")
<script>
    $("#thisForm").submit(function() {
        $(".submit-btn").attr("disabled", true);
        $("#loader").show();
    });
</script>
@endpush