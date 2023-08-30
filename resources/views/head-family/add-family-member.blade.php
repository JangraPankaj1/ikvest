

@extends('layouts.without-header')
@section('main-content-without-header')

<!-- <ul id="myUL">
  <li><span class="caret">Family Tree</span>
    <ul class="nested">
      <li>Water <input type="radio" id="html" name="fav_language" value="HTML">
<label for="html"> </label></li>
        <ul class="nested">
          <li>Black Tea <input type="radio" id="html" name="fav_language" value="HTML">
<label for="html"> HTML </label></li>
        </ul>
        <ul class="nested">
         <ul class="nested">
          <li>Black Tea <input type="radio" id="html" name="fav_language" value="HTML">
<label for="html">HTML</label></li>
        </ul>
        </ul>
      </li>
    </ul>
  </li>
</ul>
 -->
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
                               <a href="{{ route('head-family.dashboard') }}"> <img src="{{ asset('images/IkVest-Logo.svg') }} " class="icon-logo-top" /></a>

                                <h2>Add family Member</h2>
                                <form id = "thisForm" class="formRegister" action="{{ route('invite.member.post') }}" method="post">
                                    @csrf
                                       <input type="hidden" name="head_family_id" value="null">

                                    <div class="sign-up-form">
                                        <div class="fst-name">
                                        <label>First Name
                                            <input type="text"  placeholder="First Name" name="first_name" class="form-control"
                                                value="{{ old('first_name') }}" />
                                            <div class="error">
                                                @error('first_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </label>

                                        <label>Last Name
                                            <input type="text" placeholder="Last Name" name="last_name" class="form-control"
                                                value="{{ old('last_name') }}" />
                                            <div class="error">
                                                @error('last_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </label>
                                        </div>
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
                                                <option value="3">Family Member</option>
                                            </select>
                                        <div class="error">
                                            @error('role')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="submit-btn">Send Invite</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection











