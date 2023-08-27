
@extends('layouts.without-header')
@section('main-content-without-header')

   <div class="wrapper">
        <section>
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
                                <h2>Edit Event</h2>
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
              
                           
        <form id = "thisForm"  class="formRegister" action="{{ route('update.event',$event->id) }}" method="post"  enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <div class="sign-up-form">

                                        <label>Event Name
                                                <input type="text" name="event_name" placeholder="Event Name" class="form-control" value="{{$event->event_name}}"
                                                />
                                             <div class="error">
                                                @error('event_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>   
                                        </label>
                                        <label>Description
                                      <textarea id="description" name="description" placeholder="Enter a detailed description here" class="form-control" >{{$event->description}}</textarea>
                                      <div class="error">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                      </div>  
                                            
                                        </label>


                                     <label>Date & Time
                                     <input type="datetime-local" id="dateTime" name="Date_time" class="form-control"  value="{{$event->date_time}}" >
                                     <div class="error">
                                                @error('event_name')
                                                    {{ $message }}
                                                @enderror
                                      </div>  

                                      </label>

                                        <label>Place & location
                                            <input type="text" placeholder="Place" name="placeLocation" class="form-control" value="{{$event->place}}"
                                             />  
                                             <div class="error">
                                                @error('placeLocation')
                                                    {{ $message }}
                                                @enderror
                                       </div>  
                                             
                                        </label>
                                       
                                    </div>
                                    <button type="submit" class="submit-btn">Update Event</button>                                   
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
