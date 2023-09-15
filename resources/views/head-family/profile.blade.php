@extends('layouts.master')
@section('main-content')

    <div class="wrapper for-event">
        <section>
            <div class="main-back-bnr">
                <div class="container">
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-banner">
                                <h1>Profile</h1>
                                <p><a href="{{ route('posts') }}"><span>Home</span> </a>>> Profile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------end Bannner --------------------->
        <div class="main-all-page-back-image-family">
            <!-----------------------inner form ---------------->
            <section class="let-started">
                <div class="container">
                    <div class="row">
                        
                                <div class="col-lg-12">
                                    <div class="started-first">
                                        <h2>Lets Get You Started First</h2>
                                    </div>
                                </div>
                       </div>
                                
                         <form id ="thisForm"  class="formRegister" action="{{ route('profile.post') }}" method="post"  enctype="multipart/form-data">
                             @csrf
                        <div class="row">
                          <div class="col-md-3">
                            <div class="get-started">
                            <input type="file" name="image" placeholder="Choose image" id="image">
                                <!-- <img src="{{ asset('web-images/admin-edit.svg') }}" class="profile" /> -->
                                  <img src="{{ asset('web-images/edit-icon.svg') }}" class="edit-icon" />
                                            @if(Auth::user()->image_path)
                                                <img src="{{ asset(Auth::user()->image_path) }}" class="profile" alt="Profile Image" id="existing-image-preview">
                                            @else
                                                <img src="{{ asset('web-images/admin-edit.svg') }}"  alt="Default Profile Image">
                                                
                                            @endif
                                          
                                            <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="#" class="profile" alt="Preview"  style="display: none;">
                                     </div>
                                </div>
                            
                                </div>
                                <div class="col-md-9">
                                    <div class="right-get-started">
                               
                                    <div class="inr-fill-form">
                                        <label>First Name
                                            <input type="text" name="f_name" value="{{ auth()->user()->f_name }}" placeholder="First Name" />
                                         <div class="error">
                                            @error("f_name")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                        </label>
                                       
                                        <label>Last Name
                                            <input type="text" name="l_name" value="{{ auth()->user()->l_name }}" placeholder="Last Name" />
                                            <div class="error">
                                         
                                          </div>
                                        </label>
                                        <label>Email
                                        <input type="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email" disabled style="background-color: #f0f0f0; border: 1px solid #ccc;" />

                                        </label>
                                        <label>Phone
                                            <input type="number" name="phone" value="{{ auth()->user()->phone }}"placeholder="Phone" />
                                            <div class="error">
                                            @error("phone")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                        </label>
                                        <label>Date of Birth
                                            <input type="date" value="{{ auth()->user()->bdy_date }}" name="bdy_date" placeholder="Dob" />
                                            <div class="error">
                                            @error("bdy_date")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                        </label>
                                        <label>Marital Status
                                        <div class="inrr-select">
                                            <select id="marital-status" name="marital_status">
                                           
                                                <option class="Married" value="Married" {{ old('marital_status', auth()->user()->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                                <option class="Unmarried" value="Unmarried" {{ old('marital_status', auth()->user()->marital_status) == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                                                <option class="Divorced" value="Divorced" {{ old('marital_status', auth()->user()->marital_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option class="Widowed" value="Widowed" {{ old('marital_status', auth()->user()->marital_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                            </select>
                                            <div class="error">
                                                @error("marital_status")
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </label>

                                      
                                        <label id="current-spouse">Current Spouse
                                            <input type="text" value="{{ auth()->user()->current_spouse }}" name="current_spouse"   placeholder="Current Spouse" />
                                        </label>
                                        
                                        <label id="marriage-anniversary" >Marrige Anniversary
                                            <input type="date" value="{{ auth()->user()->mrg_date }}" name="mrg_date" placeholder="Marriage Anniversary" />
                                        </label>
                                    </div>
                                    <label>Description
                                        <textarea rows="5" name="description" placeholder="Description">{{ auth()->user()->description }}</textarea>
                                      
                                    </label>
                                    <button>Save and Continue</button>
                              </div>
                                </div>

                         </div>
                        </form>

                    </div>

                </div>
            </section>
        </div>    
    </div>
    @endsection
