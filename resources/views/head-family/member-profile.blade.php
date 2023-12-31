@extends('layouts.master')
@section('main-content')

<div class="wrapper for-event">
    <section>
        <div class="main-back-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-banner">
                            <h1>Member</h1>
                            <p><span>Home</span> >> Member</p>
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
                                            @if($user->image_path)
                                            <img src="{{ asset($user->image_path) }}" alt="Profile Image" id="existing-image-preview">
                                            @else
                                            <img src="{{ asset('images/admin.svg') }}" alt="Default Profile Image" id="existing-image-preview">
                                            @endif
                                        </div>
                                        <div class="profile-name">
                                            <h4>{{ucfirst($user->f_name)}} {{ $user->l_name }}</h4>
                                            <p>{{$user->email}}</p>
                                        </div>

                                        <div class="member-show for-edit">

                                            @if($user->bdy_date)

                                            <div class="inr-edit">
                                                <img src="{{ asset('web-images/la_birthday-cake.svg') }}" />
                                                <p>{{ $user->bdy_date}}</p>
                                            </div>
                                            @endif

                                         </div>
                                          <div class="inr-profle-data">
                                                    <div class="row">
                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ $user->email}}</span> <i class="fa fa-envelope" aria-hidden="true"></i></h4>
                                                            </div>
                                                        </div>
                                                        @if($user->bdy_date)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{$user->bdy_date}}</span><i class="fa-solid fa-calendar-day"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if($user->phone)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ $user->phone}}</span><i class="fa-solid fa-phone"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if($user->marital_status)

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ $user->marital_status}}</span><i class="fa-regular fa-life-ring"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">

                                                                <h4><span>{{ ucfirst($user->f_name )}}  {{ $user->l_name }}</span><i class="fa-solid fa-pen-nib"></i></h4>
                                                            </div>
                                                        </div>
                                                        @if($user->mrg_date)
                                                        <div class="col-md-12 text-md-start text-sm-start">
                                                            <div class="mail-address">
                                                                <h4><span>{{ $user->mrg_date}}</span><i class="fa-regular fa-calendar-days"></i></h4>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
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
                                                            <h5>{{ $user->f_name }} {{ $user->l_name }}</h5>
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
                                            @if (count($data) === 0)
                                                <p> No data found.</p>
                                            @else

                            @foreach($data as $key=>$post)
                             @foreach ($post->user()->latest()->get() as $user)


                            <div class="full-data-profile">
                                @if (auth()->user()->id === $user->id)

                                    <div class="dropdown">
                                        <button class="three-dots btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

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
                                            <div class="swiper mySwiper">
                                             <div class="swiper-wrapper">
                                                    @foreach ($imagePaths as $index => $imagePath)
                                                    @php
                                                    $extension = pathinfo($imageNames[$index], PATHINFO_EXTENSION);
                                                    $lightboxGroup = (count($imagePaths) > 1) ? 'roadtrip' : 'image-1';
                                                    @endphp



                                                        <div class="swiper-slide"> <!-- Adjust margin as needed -->
                                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))

                                                            <a class="example-image-link" href="{{ asset($imagePath) }}" data-lightbox="{{ $lightboxGroup }}">

                                                                <img src="{{ asset($imagePath) }}"  alt="Image" width="50" height="400"> </a>

                                                            @elseif (in_array($extension, ['mp4', 'webm']))

                                                            <video controls width="200">
                                                                <source src="{{ asset($imagePath) }}" type="video/mp4">
                                                            </video>
                                                            @endif

                                                        </div>
                                                    @endforeach
                                            </div>
                                            <!-- <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-pagination"></div> -->
                                            </div>

                                            @endif
                                            @endif
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
                            @endif

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

@endsection

