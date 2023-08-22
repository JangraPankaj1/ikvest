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
        <section class="verification">
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
                                <img src="{{ asset('images/IkVest-Logo.svg') }}" class="icon-logo-top" />
                                <h2>Verification</h2>
                                <p> 
                                    @if (session()->has("message"))
                                    <div class="alert alert-success">
                                        {{ session()->get("message") }}
                                    </div>
                                    @endif
                                </p>
                                <p class="time"></p>
                                   <p id="message_error" style="color:red;"></p>
                                   <p id="message_success" style="color:green;"></p>

                                <form method="post" id="verificationForm">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <div class="otp-fields">
                                        <input type="text" class="otp-input" name="otp[]"  maxlength="1" >
                                        <input type="text" class="otp-input" name="otp[]" maxlength="1" >
                                        <input type="text" class="otp-input" name="otp[]" maxlength="1" >
                                        <input type="text" class="otp-input" name="otp[]" maxlength="1" >
                                        <input type="text" class="otp-input" name="otp[]" maxlength="1" >
                                        <input type="text" class="otp-input" name="otp[]" maxlength="1" >
                                    </div>
                                    <button>Verify</button>
                                </form>
                                <button id="resendOtpVerification">Resend Verification OTP</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        $('#verificationForm').submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url:"{{ route('verifiedOtp') }}",
                type:"POST",
                data: formData,
                success:function(res){
                    if(res.success){
                        alert(res.msg);
                    // Navigate to the "/login" URL
                    window.location.href = "/login";
                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });

        $('#resendOtpVerification').click(function(){
            $(this).text('Wait...');
            var userMail = @json($email);

            $.ajax({
                url:"{{ route('resendOtp') }}",
                type:"GET",
                data: {email:userMail },
                success:function(res){
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if(res.success){
                        timer();
                        $('#message_success').text(res.msg);
                        setTimeout(() => {
                            $('#message_success').text('');
                        }, 3000);
                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });
    });

    function timer()
    {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {

            if(minutes < 0){
                $('.time').text('');
                clearInterval(timer);
            }
            else{
                let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                $('.time').text(tempMinutes+':'+tempSeconds);
            }

            if(seconds <= 0){
                minutes--;
                seconds = 59;
            }

            seconds--;

        }, 1000);
    }

    timer();

</script>

<script>

document.addEventListener("DOMContentLoaded", function() {
    const otpInputs = document.querySelectorAll(".otp-input");

    otpInputs.forEach((input, index) => {
        input.addEventListener("input", function() {
            if (this.value.length === this.maxLength) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            } else if (this.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });

        // Allow arrow keys to move cursor
        input.addEventListener("keydown", function(event) {
            if (event.key === "ArrowLeft" && index > 0) {
                otpInputs[index - 1].focus();
            } else if (event.key === "ArrowRight" && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });
    });
});

</script>


