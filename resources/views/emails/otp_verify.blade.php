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

    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">OTP Validation</h4>

        <form class="card p-2" id = "thisForm" action="{{ route('submit.verify') }}" method="post">

                 @csrf

                <input type="hidden" value="" name="userEmail">
                    <div class="input-group">
                        <input type="text" class="form-control" name="otp" id="otp"   required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>

                <div>Expire In <span id="timer"></span></div>
                    {!! csrf_field() !!}
                <input id="uniqueId" name="uniqueId" type="hidden">

        </form>

        <form class="needs-validation" action="" method="post" novalidate>

             {!! csrf_field() !!}
             <input id="uniqueId" name="uniqueId" type="hidden" >
             <button class="btn btn-success" type="submit">Resend OTP</button>

        </form>

    </div>
