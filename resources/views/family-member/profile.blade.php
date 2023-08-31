
@extends('layouts.without-header')
@section('main-content-without-header')

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
                                <h2>Update Profile</h2>
                                <form id = "thisForm" id="upload-image" class="formRegister" action="{{ route('post.profile') }}" method="post"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="sign-up-form">
                                        <div class="fst-name">
                                        <label>First Name
                                            <input type="text"  placeholder="First Name" name="f_name" class="form-control"
                                                value="{{ auth()->user()->f_name }}" />

                                        </label>

                                        <label>Last Name
                                            <input type="text" placeholder="Last Name" name="l_name" class="form-control"
                                             value="{{ auth()->user()->l_name }}" />

                                        </label>
                                        </div>

                                        <label>Birthday Date
                                            <input type="date" name="bdy_date" placeholder="Email Address" class="form-control"value="{{ auth()->user()->bdy_date }}"
                                            />
                                        </label>

                                        <label>Marriage Anniversary Date
                                            <input type="date" name="mrg_date" placeholder="Email Address" value="{{ auth()->user()->mrg_date }}" class="form-control"
                                            />

                                        </label>
                                        <label>Email
                                            <input type="text" name="email" placeholder="Email Address" class="form-control"
                                            value="{{ auth()->user()->email }}" disabled/>

                                        </label>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                            <label>Profile Pic

                                                <input type="file" name="image" placeholder="Choose image" id="image">
                                                    @error('image')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    <!-- Display existing profile image or default image -->
                                            @if(Auth::user()->image_path)
                                                <img src="{{ asset(Auth::user()->image_path) }}" height="90" width="90" alt="Profile Image" id="existing-image-preview">
                                            @else
                                                <img src="{{ asset('images/admin.svg') }}" height="90" width="90" alt="Default Profile Image" id="existing-image-preview">
                                            @endif
                                            </label>

                                             </div>
                                         </div>
                                        <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="#" alt="Preview" height="90" width="90" style="display: none;">

                                        </div>
                                    </div>
                                    <button type="submit" class="submit-btn">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
            $('#preview-image-before-upload').show(); // Show the new image preview
            $('#existing-image-preview').hide(); // Hide the existing image preview
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>

