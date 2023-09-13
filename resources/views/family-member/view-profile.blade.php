@extends('layouts.master')
@section('main-content')

    <div class="wrapper for-event">     
        <section>

            <div class="main-back-bnr">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-banner">
                                <h1>My Profile</h1>
                                <p><span>Home</span> >>My Profile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------end Bannner --------------------->
        <div class="main-all-page-back-image-family">

            <!----------------- My Profile --------------------->
            <section>
                <div class="container">
                    <div class="main-inr-profile-one">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="Profile-one">
                                    <div class="back-icon">
                                        <a href="">
                                            <img src="{{ asset('web-images/back.svg')}}" />
                                        </a>
                                    </div>
                                    <div class="edit-profile">
                                        <h2>My Profile</h2>
                                    </div>
                                    <div class="edit-icon">
                                    <a href="{{route('profile.page')}}">
                                            <img src="{{ asset('web-images/edit-green.svg')}}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right-btn-event">
                                    <div class="new-event">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 30 30" fill="none">
                                                <path
                                                    d="M4.5498 15C4.5498 20.7781 9.22173 25.45 14.9998 25.45C20.7779 25.45 25.4498 20.7781 25.4498 15C25.4498 9.22192 20.7779 4.54999 14.9998 4.54999C9.22173 4.54999 4.5498 9.22192 4.5498 15ZM6.2498 15C6.2498 10.1581 10.1579 6.24999 14.9998 6.24999C19.8417 6.24999 23.7498 10.1581 23.7498 15C23.7498 19.8419 19.8417 23.75 14.9998 23.75C10.1579 23.75 6.2498 19.8419 6.2498 15Z"
                                                    fill="white" stroke="white" stroke-width="0.5" />
                                                <path
                                                    d="M9.6001 14.15H9.3501V14.4V15.6V15.85H9.6001H20.4001H20.6501V15.6V14.4V14.15H20.4001H9.6001Z"
                                                    fill="white" stroke="white" stroke-width="0.5" />
                                                <path
                                                    d="M14.3999 9.34998H14.1499V9.59998V20.4V20.65H14.3999H15.5999H15.8499V20.4V9.59998V9.34998H15.5999H14.3999Z"
                                                    fill="white" stroke="white" stroke-width="0.5" />
                                            </svg>
                                            New Event</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="main-inr-ian-vest">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="inr-profile-pic">
                                @if(Auth::user()->image_path)
                                                <img src="{{ asset(Auth::user()->image_path) }}" class="profile" alt="Profile Image" id="existing-image-preview">
                                            @else
                                                <img src="{{ asset('web-images/admin-edit.svg') }}"  alt="Default Profile Image">
                                                
                                            @endif
                                 </div>
                            </div>
                            <div class="col-md-9">
                                <div class="inr-right-data">
                                <div class="inr-name-data">
                                        <p>Name :</p>
                                        @if(!empty(auth()->user()->f_name))
                                            <h5>{{ auth()->user()->f_name }}</h5>
                                        @else
                                            <h5>N/A</h5>
                                        @endif
                                    </div>

                                    <div class="inr-name-data">
                                        <p>Email :</p>
                                        <h5>{{ auth()->user()->email }}</h5>
                                    </div>
                                    <div class="inr-name-data">
                                    <p>Phone :</p>
                                        @if(!empty(auth()->user()->phone))
                                            <h5>{{ auth()->user()->phone }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif
                                       
                                    </div>
                                    <div class="inr-name-data">
                                    <p>Marital Status :</p>
                                        @if(!empty(auth()->user()->marital_status))
                                            <h5>{{ auth()->user()->marital_status }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif
                                     
                                    
                                    </div>
                                    <div class="inr-name-data">
                                        <p>Current Spouse :</p>
                                        @if(!empty(auth()->user()->current_spouse))
                                            <h5>{{ auth()->user()->current_spouse }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif
                                        
                                    </div>
                                    <div class="inr-name-data"> 
                                    <p>Date of Birth :</p>
                                        @if(!empty(auth()->user()->bdy_date))
                                            <h5>{{ auth()->user()->bdy_date }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif

                                     
                                   
                                    </div>
                                    <div class="inr-name-data">

                                    <p>Marrige Anniversary :</p>
                                        @if(!empty(auth()->user()->mrg_date))
                                            <h5>{{ auth()->user()->mrg_date }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif


                                    </div>
                                    <div class="inr-name-data">
                                        
                                    <p>Bio :</p>
                                        @if(!empty(auth()->user()->description))
                                            <h5>{{ auth()->user()->description }}</h5>
                                        @else
                                        <h5>N/A</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>        
    </div>

    @endsection
