@extends('layouts.master')
@section('main-content')

<div class="wrapper for-event">
    <section>
        <div class="main-back-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-banner">
                            <h1>Investment Documents</h1>
                            <p><span>Home</span> >> Investment Documents</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-----------------end Bannner --------------------->
    <div class="main-all-page-back-image-family">
        <!-----------------Profile Name --------------------->
        <section class="for-evnt">
            <div class="container">
                <div class="main-inner-timelines ">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="main-profile-event">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="upload-image">
                                        <div class="upload-image-inr">
                                            @if(Auth::user()->image_path)
                                            <img src="{{ asset(Auth::user()->image_path) }}" alt="Profile Image" id="existing-image-preview">
                                            @else
                                            <img src="{{ asset('images/admin.svg') }}" alt="Default Profile Image" id="existing-image-preview">
                                            @endif
                                        </div>
                                        <div class="profile-name">
                                            <h4>{{ucfirst(Auth::user()->f_name)}} {{ Auth::user()->l_name }}</h4>
                                            <p>{{Auth::user()->email}}</p>
                                        </div>

                                            <div class="member-show for-edit">

                                            @if(Auth::user()->bdy_date)

                                            <div class="inr-edit">
                                                <img src="{{ asset('web-images/la_birthday-cake.svg') }}" />
                                                <p>{{ Auth::user()->bdy_date}}</p>
                                            </div>
                                            @endif

                                         </div>
                                          <div class="inr-profle-data">
                                                    <div class="row">
                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ Auth::user()->email}}</span> <i class="fa fa-envelope" aria-hidden="true"></i></h4>
                                                            </div>
                                                        </div>
                                                        @if(Auth::user()->bdy_date)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ Auth::user()->bdy_date}}</span><i class="fa-solid fa-calendar-day"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if(Auth::user()->phone)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ Auth::user()->phone}}</span><i class="fa-solid fa-phone"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if(Auth::user()->marital_status)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ Auth::user()->marital_status}}</span><i class="fa-regular fa-life-ring"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ ucfirst(Auth::user()->f_name )}}  {{ Auth::user()->l_name }}</span><i class="fa-solid fa-pen-nib"></i></h4>
                                                            </div>
                                                        </div>

                                                        @if(Auth::user()->mrg_date)
                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ Auth::user()->mrg_date}}</span><i class="fa-regular fa-calendar-days"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                        <div class="new-event">
                                            <a href="{{ route('get.investment') }}">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                        <path d="M4.5498 15C4.5498 20.7781 9.22173 25.45 14.9998 25.45C20.7779 25.45 25.4498 20.7781 25.4498 15C25.4498 9.22192 20.7779 4.54999 14.9998 4.54999C9.22173 4.54999 4.5498 9.22192 4.5498 15ZM6.2498 15C6.2498 10.1581 10.1579 6.24999 14.9998 6.24999C19.8417 6.24999 23.7498 10.1581 23.7498 15C23.7498 19.8419 19.8417 23.75 14.9998 23.75C10.1579 23.75 6.2498 19.8419 6.2498 15Z" fill="white" stroke="white" stroke-width="0.5" />
                                                        <path d="M9.6001 14.15H9.3501V14.4V15.6V15.85H9.6001H20.4001H20.6501V15.6V14.4V14.15H20.4001H9.6001Z" fill="white" stroke="white" stroke-width="0.5" />
                                                        <path d="M14.3999 9.34998H14.1499V9.59998V20.4V20.65H14.3999H15.5999H15.8499V20.4V9.59998V9.34998H15.5999H14.3999Z" fill="white" stroke="white" stroke-width="0.5" />
                                                    </svg>
                                                    New Docs
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="col-md-8">
                                <div class="inner-profile-data">

                                <div class="coment-view">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">

                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">


                            @foreach($data  as $key=>$post)
                              @foreach ($post->user()->latest()->get() as $user)

                              <div class="full-data-profile">
                                  @if (auth()->user()->id === $user->id)

                                   <div class="dropdown">
                                        <button class="three-dots btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item delete-button-investment" data-id="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></button>
                                        </div>

                                        </div>
                                    @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inr-img-data">
                                            <div class="lft-img">
                                                @if($user->image_path)
                                                <img src="{{ asset($user->image_path) }}" alt="Profile Image" id="existing-image-preview">
                                                @else
                                                <img src="{{ asset('images/admin.svg') }}" alt="Default Profile Image" id="existing-image-preview">
                                                @endif
                                            </div>

                                            <div class="right-data">
                                                <h4>{{$user->f_name}} {{$user->l_name}}</h4>
                                                <p>{{ $post->created_at->diffForHumans() }}<span>.</span>
                                                <i class="fa-solid fa-earth-americas"></i></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inr-dis-data">
                                            <p>{{ ucfirst($post->description) }}</p>

                                            @if ($post->docs && $post->docs_path)
                                                @php
                                                    $fileNames = json_decode($post->docs, true);
                                                    $filePaths = json_decode($post->docs_path, true);
                                                @endphp

                                                @if ($fileNames && $filePaths)
                                                    <div class="swiper mySwiper">
                                                        <div class="swiper-wrapper">
                                                            @foreach ($filePaths as $index => $filePath)
                                                                @php
                                                                    $extension = pathinfo($fileNames[$index], PATHINFO_EXTENSION);
                                                                    $lightboxGroup = (count($filePaths) > 1) ? 'roadtrip' : 'image-1';
                                                                @endphp

                                                                <div class="swiper-slide">
                                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                        <!-- Display images -->
                                                                        <a class="example-image-link" href="{{ asset($filePath) }}" data-lightbox="{{ $lightboxGroup }}">
                                                                            <img src="{{ asset($filePath) }}" alt="Image" width="50" height="400">
                                                                        </a>
                                                                    @elseif (in_array($extension, ['mp4', 'webm']))
                                                                        <!-- Display videos -->
                                                                        <video controls width="200">
                                                                            <source src="{{ asset($filePath) }}" type="video/mp4">
                                                                        </video>
                                                                    @elseif (in_array($extension, ['pdf']))
                                                                        <!-- Display PDFs -->
                                                                        <a href="{{ asset($filePath) }}" target="_blank">View {{ strtoupper($extension) }}</a>
                                                                    @else
                                                                        <!-- Display other file types -->
                                                                        <a href="{{ asset($filePath) }}" download>Download {{ strtoupper($extension) }}</a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                @elseif ($post->video_link)

                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $post->video_id }}?si=5Lg1sszvYtVxh1Tz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                                                @elseif ($post->video_type =='vimeo')

                                                <iframe
                                                    src="https://player.vimeo.com/video/108750054"
                                                    width="560"
                                                    height="315"
                                                    frameborder="0"
                                                    allow="autoplay; fullscreen"
                                                    allowfullscreen
                                                    >
                                                </iframe>


                                                @endif



                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @endforeach

                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </section>



            <!--------------------------------pagenation------------------------>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 px-0">
                            <div class="main-inner-pagenation">
                                <div class="inr-tabs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>

</div>



      <!-------------------------- Delete modal ----------------------------->
    <!-- Button trigger modal -->

    <!-- Modal -->

    <div class="modal fade for-delete" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                <div class="modal-body">
                    <div class="delete-icon">
                        <img src="{{ asset('web-images/delete-icon-modal.svg')}}" />
                    </div>
                    <h2>Are you sure you want to delete ?</h2>
                    <p>If you delete you can't recover it.</p>
                    <div class="inr-btns">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="modelDelete" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
     </div>


    <div class="modal fade for-delete" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                <div class="modal-body">
                    <div class="delete-icon">
                        <img src="{{ asset('web-images/delete-icon-modal.svg')}}" />
                    </div>
                    <h2>Are you sure you want to delete ?</h2>
                    <p>If you delete you can't recover it.</p>
                    <div class="inr-btns">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="modelDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

