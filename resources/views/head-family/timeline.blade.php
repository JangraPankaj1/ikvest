@extends('layouts.master')
@section('main-content')

<div class="wrapper for-event">
    <section>
        <div class="main-back-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-banner">
                            <h1>Event</h1>
                            <p><span>Home</span> >> Events</p>
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
                                                <div class="inr-edit mamber-list">
                                                    <img src="{{ asset('web-images/mdi_family-tree.svg') }}" height="90" width="90" alt="Default Profile Image" id="existing-image-preview">
                                                    <p><span>{{ $memberCount }}</span>Family Members</p>
                                                </div>
                                            @if(Auth::user()->bdy_date)

                                            <div class="inr-edit">
                                                <img src="{{ asset('web-images/la_birthday-cake.svg') }}" />
                                                <p>{{ Auth::user()->bdy_date}}</p>
                                            </div>
                                            @endif
                                            <div class="inr-edit">
                                                <a href="{{ route('profile.post'); }}">
                                                    <img src="{{ asset('web-images/edit.svg') }}" />
                                                    <p>Edit</p>
                                                </a>
                                            </div>
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
                                            <a href="{{ route('post') }}">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                        <path d="M4.5498 15C4.5498 20.7781 9.22173 25.45 14.9998 25.45C20.7779 25.45 25.4498 20.7781 25.4498 15C25.4498 9.22192 20.7779 4.54999 14.9998 4.54999C9.22173 4.54999 4.5498 9.22192 4.5498 15ZM6.2498 15C6.2498 10.1581 10.1579 6.24999 14.9998 6.24999C19.8417 6.24999 23.7498 10.1581 23.7498 15C23.7498 19.8419 19.8417 23.75 14.9998 23.75C10.1579 23.75 6.2498 19.8419 6.2498 15Z" fill="white" stroke="white" stroke-width="0.5" />
                                                        <path d="M9.6001 14.15H9.3501V14.4V15.6V15.85H9.6001H20.4001H20.6501V15.6V14.4V14.15H20.4001H9.6001Z" fill="white" stroke="white" stroke-width="0.5" />
                                                        <path d="M14.3999 9.34998H14.1499V9.59998V20.4V20.65H14.3999H15.5999H15.8499V20.4V9.59998V9.34998H15.5999H14.3999Z" fill="white" stroke="white" stroke-width="0.5" />
                                                    </svg>
                                                    New Event
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
                                    @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                    <form action="{{ route('post.comments.head', $post->id) }}" id="upload-image" class="flex justify-between space-x-2" method="POST">
                                        @csrf
                                        <div class="inr-comnt-sec">
                                            <!-- <input type="text" name="comment" placeholder="Write a comment..." required /> -->
                                            <div class="containerComment">
                                                <textarea id="auto-resize-textarea" name="comment" placeholder="Write a comment..." class="textareaComment"></textarea>
                                            </div>

                                            <button type="submit"><img src="{{ asset('web-images/comnt.svg')}}" /></button>

                                        </div>
                                    </form>
                                </div>

                                <div class="coment-view">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">

                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Comments
                                                </button>

                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                                <div class="accordion-body">
                                                @foreach ($post->comments()->latest()->take(2)->get() as $comment)
                                                 @foreach ($comment->user()->latest()->get() as $user)
                                                      <div class="first-comnt">
                                                         <div class="inr-connents-for">
                                                            @if ($user->image_path)
                                                            <img src="{{ asset($user->image_path) }}" height="30" width="30" alt="Profile Image" id="existing-image-preview">
                                                            @else
                                                            <img src="{{ asset('images/admin.svg') }}" height="30" width="30" alt="Default Profile Image" id="existing-image-preview">
                                                            @endif
                                                            <h5>{{ $user->f_name }}</h5>
                                                            <p>{{ $comment->created_at->diffForHumans() }}</p>

                                                                @if (auth()->user()->id === $user->id)

                                                        <button  class="delete comment-delete" data-Id="{{$post->id}}" data-comment="{{ $comment->id}}"data-bs-toggle="modal" data-bs-target="#commentModal">
                                                            <img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}">
                                                        </button>

                                                        @endif

                                                        </div>
                                                        <div class="inr-dis-comment">

                                                            <!-- <p>
                                                            <span>{{$user->email }}</span>
                                                            @if ($comment->comment)
                                                                {{ ucfirst($comment->comment) }}


                                                                @else
                                                                No comments on this post.

                                                                @endif
                                                            </p>  -->

                                                            <p>
                                                                <span>{{ $user->email }}</span>
                                                                @php
                                                                    $commentText = ucfirst($comment->comment);
                                                                    $displayComment = strlen($commentText) > 2000 ? substr($commentText, 0, 10000) : $commentText;
                                                                @endphp

                                                                <p class="comment-text{{ strlen($commentText) > 500 ? ' collapsed' : '' }}">{{ $displayComment }}</p>

                                                                @if (strlen($commentText) > 300)
                                                                    <a href="#" class="read-more">Read more</a>
                                                                @endif
                                                            </p>

                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endforeach
                                                </div>
                                            @endif
                                            @if (session()->has("message"))
                                                <div class="alert alert-success">
                                                    {{ session()->get("message") }}
                                                </div>
                                            @endif
                                   @foreach($data as $key=>$post)
                                     @foreach ($post->user()->latest()->get() as $user)


                                    <div class="full-data-profile">
                                      @if (auth()->user()->id === $user->id)

                                    <div class="dropdown">

                                            <button class="three-dots btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button >

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('post.edit', $post->id) }}"> <i class="fas fa-pencil"></i></a>
                                                <button class="dropdown-item delete-button" data-id="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></button>
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
                                            <!-- @if (auth()->user()->id === $user->id) -->

                                            <!-- <form id="deletePost" action="{{ route('post.delete', $post->id) }}" class="flex justify-between space-x-2" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button class="delete" id="deletePostButton"><img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}"></button>
                                            </form>
                                                @endif
                                            @if (auth()->user()->id === $user->id)
                                                    <a href="{{ route('post.edit', $post->id) }}" class="edit-post-button">Edit</a>
                                                @endif -->
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="inr-dis-data">
                                            <p>{{ ucfirst($post->post_message) }}</p>

                                            @if ($post->docs && $post->docs_path)
                                                @php
                                                    $imageNames = json_decode($post->docs, true);
                                                    $imagePaths = json_decode($post->docs_path, true);
                                                @endphp

                                                @if ($imageNames && $imagePaths)
                                                    @php
                                                         $lightboxGroup = 'post_' . $post->id;
                                                         $imageCount = count($imageNames); // Count the number of images
                                                        @endphp

                                                            <div class="swiper mySwiper">
                                                                <div class="swiper-wrapper">
                                                                    @foreach ($imagePaths as $index => $imagePath)
                                                                    @php
                                                                    $extension = pathinfo($imageNames[$index], PATHINFO_EXTENSION);
                                                                    @endphp
                                                                  <div class="swiper-slide">
                                                                     @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                      @if ($imageCount)

                                                                        @php
                                                                        $imagePairs = array_chunk($imagePaths, 4);
                                                                        $pairCount = count($imagePairs); // Group images into pairs
                                                                        @endphp


                                                                            @foreach ($imagePairs as $pairIndex => $pair)
                                                                            @if ($pairIndex == 0)
                                                                            <div class="image-pair">
                                                                                @foreach ($pair as $kpair => $imagePath)
                                                                            @php $kfade = '';@endphp
                                                                                @if($imageCount > 4)
                                                                                @php

                                                                                    $kfade = $kpair == 3? 'kfade':'';
                                                                                @endphp
                                                                                @endif

                                                                                <div class="image  {{$kfade}}">
                                                                                   <a class="example-image-link" href="{{ asset($imagePath) }}" data-lightbox="{{ $lightboxGroup }}">
                                                                                    <img src="{{ asset($imagePath) }}" alt="Image">
                                                                                    @if ($imageCount  > 4 and $kpair == 3)
                                                                                    <div class="fade-overlay">
                                                                                        <span class="count-image"> {{$imageCount - 4 == 0?'':'+'.$imageCount-4}}</span>
                                                                                    </div>

                                                                                        @endif
                                                                                    </a>

                                                                                </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif
                                                                                @endforeach
                                                                                @endif
                                                                                @elseif (in_array($extension, ['mp4', 'webm']))
                                                                                <video controls width="200">
                                                                                    <source src="{{ asset($imagePath) }}" type="video/mp4">
                                                                                </video>

                                                                            @endif
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                        <!-- Add your Swiper navigation buttons and pagination here if needed -->
                                                    </div>
                                                @endif

                                            @endif

                                            <!-- Add birthday users -->
                                             <!-- @if ($birthdayUsers->isNotEmpty())
                                                <div class="birthday-users">
                                                    <ul>
                                                        @foreach ($birthdayUsers as $user)
                                                            <li>Happy Birthday {{ $user->f_name }} {{ $user->l_name }} ({{ $user->bdy_date }})</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif -->

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inr-comment">
                                            @if(Auth::user()->image_path)
                                            <img src="{{ asset(Auth::user()->image_path) }}" alt="Profile Image" id="existing-image-preview">
                                            @else
                                            <img src="{{ asset('images/admin.svg') }}" alt="Default Profile Image" id="existing-image-preview">
                                            @endif

                                            <form action="{{ route('post.comments.head', $post->id) }}" class="flex justify-between space-x-2" method="POST">
                                                @csrf
                                                <div class="inr-comnt-sec">
                                                    <!-- <input type="text" name="comment" placeholder="Write a comment..." required /> -->
                                                    <div class="containerComment">
                                                        <textarea id="auto-resize-textarea" name="comment" placeholder="Write a comment..." class="textareaComment"></textarea>
                                                    </div>

                                                    <button type="submit"><img src="{{ asset('web-images/comnt.svg')}}" /></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="coment-view">
                                            @if (count($post->comments()->latest()->get()) > 0)
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">

                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Comments
                                                        </button>

                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                                        <div class="accordion-body">
                                                        @foreach ($post->comments()->latest()->take(2)->get() as $comment)
                                                            @foreach ($comment->user()->latest()->get() as $user)
                                                                <div class="first-comnt">
                                                                    <div class="inr-connents-for">
                                                                        @if ($user->image_path)
                                                                        <img src="{{ asset($user->image_path) }}" height="30" width="30" alt="Profile Image" id="existing-image-preview">
                                                                        @else
                                                                        <img src="{{ asset('images/admin.svg') }}" height="30" width="30" alt="Default Profile Image" id="existing-image-preview">
                                                                        @endif
                                                                        <h5>{{ $user->f_name }} {{ $user->l_name }}</h5>
                                                                        <p>{{ $comment->created_at->diffForHumans() }}</p>

                                                                            @if (auth()->user()->id === $user->id)

                                                                    <button  class="delete comment-delete" data-Id="{{$post->id}}" data-comment="{{ $comment->id}}"data-bs-toggle="modal" data-bs-target="#commentModal">
                                                                    <i class="fa fa-trash"></i>
                                                                    </button>

                                                                    @endif

                                                                    </div>
                                                                    <div class="inr-dis-comment">


                                                                            @php
                                                                                $commentText = ucfirst($comment->comment);
                                                                                $displayComment = strlen($commentText) > 2000 ? substr($commentText, 0, 10000) : $commentText;
                                                                            @endphp


                                                                            <p class="comment-text{{ strlen($commentText) > 300 ? ' collapsed' : '' }}"
                                                                            {{ strlen($commentText) > 300 ? ' style=max-height:8em': '' }}><a href="#">{{ $user->email }}</a>  {{ $displayComment }}</p>

                                                                            @if (strlen($commentText) > 300)
                                                                                <a href="#" class="read-more">Read more</a>
                                                                            @endif

                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="view-comments-button" data-post-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View all comments</h4>

                                            @else
                                                <p class="no-comnt-title"> No comments on this post. </p>
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

            {!! $data->render('vendor/pagination/default') !!}

            <!--------------------------------end pagenation------------------------>









        <!-----------------end sticky Profile Name --------------------->
    </div>

</div>

 <!-- Modal  for shoing all data posts and comments-->
 <div class="modal fade for-all-comments-show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="inner-profile-data">
                        <div class="full-data-profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="inr-img-data">
                                        <div class="lft-img">
                                            <!-- here is fetch auth image if exists otherwise default image -->
                                        </div>
                                        <div class="right-data">
                                            <h4><!-- here is fetch auth f_name --></h4>
                                            <p id="both"><!-- here is fetch posts created time --><span></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="inr-dis-data">
                                        <p><!-- here is fetch posts --></p>
                                        <div class="swiper modal_swiper"></div>
                                        <h5>All Comments</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="inr-comnts-modl">

                                 <div class="first-comnt">
                                    <div class="inr-connents-for">
                                     <!-- here is fetch images -->
                                         <!-- here is fetch name -->

                                        <p><!-- here is fetch time --></p>
                                             <!-- here is READ MORE BUTTON -->

                                    </div>
                                    <div class="inr-dis-comment">
                                        <p><span><!-- here is fetch email --></span>

                                      <!-- here is fetch comment if comment exists -->
                                        </p>
                                    </div>
                                  </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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

@include('layouts.sidebar-profile')
@endsection

