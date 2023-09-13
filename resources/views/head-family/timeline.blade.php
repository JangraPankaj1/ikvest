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
                <div class="main-inner-timelines">
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
                                            <h4>{{ucfirst(Auth::user()->f_name)}}</h4>
                                            <p>{{Auth::user()->email}}</p>
                                        </div>

                                        <div class="member-show for-edit">
                                            <div class="inr-edit mamber-list">
                                                <img src="{{ asset('web-images/mdi_family-tree.svg') }}" height="90" width="90" alt="Default Profile Image" id="existing-image-preview">
                                                <p><span>{{ $memberCount }}</span>Family Members</p>
                                            </div>
                                            <div class="inr-edit">
                                                <img src="{{ asset('web-images/la_birthday-cake.svg') }}" />
                                                <p>{{ Auth::user()->bdy_date}}</p>
                                            </div>
                                            <div class="inr-edit">
                                                <a href="{{ route('profile.post'); }}">
                                                    <img src="{{ asset('web-images/edit.svg') }}" />
                                                    <p>Edit</p>
                                                </a>
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
                                                <h4>{{$user->f_name}}</h4>
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
                                            <div style="width:100%; display: flex; flex-direction: row;">
                                                @foreach ($imagePaths as $index => $imagePath)
                                                @php
                                                $extension = pathinfo($imageNames[$index], PATHINFO_EXTENSION);
                                                @endphp

                                                <div style="width:100%; margin-right: 10px;"> <!-- Adjust margin as needed -->
                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset($imagePath) }}" alt="Image" width="50" height="400">
                                                    @elseif (in_array($extension, ['mp4', 'webm']))
                                                    <video controls width="200">
                                                        <source src="{{ asset($imagePath) }}" type="video/mp4">
                                                    </video>
                                                    @endif
                                                </div>
                                                @endforeach
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
                                                                        <h5>{{ $user->f_name }}</h5>
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
        </section>
        <!-----------------end sticky Profile Name --------------------->
    </div>

</div>

 <!-- Modal -->
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
                                        <p><!-- here is fetch posts -->
                                    </p>
                                        <!-- here is fetch images or video if post exists -->
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
                        <button type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

//delete post
$(document).ready(function() {
// When the delete button is clicked
$(".delete-button").click(function() {
    // Store the item ID from the data attribute
    var postId = $(this).data("id");
    console.log(postId);

    // When the modal's delete button is clicked
      $(document).on('click', '#exampleModal .modal-body button.modelDelete', function() {

        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
             url: 'post/' + postId ,
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token if needed
            },
            success: function(response) {
                  console.log(response);

                // Handle success, e.g., show a success message
                if (response.message) {
                    Swal.fire(
                        'Deleted!',
                        'Post has been deleted.',
                        'success'
                    ).then(function() {
                        // Reload or refresh the page or perform any other action
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                // Handle errors, e.g., show an error message
                console.error(xhr.responseText);
            },
        });

        // After submitting the form, close the modal
        $("#exampleModal").modal("hide");
    });
  });
});



//delete comments
$(document).ready(function() {
// When the delete button is clicked
$(".comment-delete").click(function() {
    // Store the item ID from the data attribute
    var postId = $(this).data("id");
    console.log(postId);
    var comment = $(this).data("comment");
    console.log(comment);


    // When the modal's delete button is clicked
    $(document).on('click', '#commentModal .modal-body button.modelDelete', function() {
        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
            url: 'posts/' + postId + '/comments/' + comment,
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token if needed
            },
            success: function(response) {
                  console.log(response);

                // Handle success, e.g., show a success message
                if (response.message) {
                    Swal.fire(
                        'Deleted!',
                        'Comment has been deleted.',
                        'success'
                    ).then(function() {
                        // Reload or refresh the page or perform any other action
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                // Handle errors, e.g., show an error message
                console.error(xhr.responseText);
            },
        });

        // After submitting the form, close the modal
        $("#commentModal").modal("hide");
    });
  });
});



function deleteComment(postId, comment) {
// When the delete button is clicked

$(document).on('click', '#commentModal .modal-body button.modelDelete', function() {
        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
            url: 'posts/' + postId + '/comments/' + comment,
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token if needed
            },
            success: function(response) {
                  console.log(response);

                // Handle success, e.g., show a success message
                if (response.message) {
                    Swal.fire(
                        'Deleted!',
                        'Comment has been deleted.',
                        'success'
                    ).then(function() {
                        // Reload or refresh the page or perform any other action
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                // Handle errors, e.g., show an error message
                console.error(xhr.responseText);
            },
        });

        // After submitting the form, close the modal
        $("#commentModal").modal("hide");
    });
}




// function deleteComment(postId, comment) {
//     // Show a confirmation dialog using SweetAlert
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Get the CSRF token value from the meta tag
//             var csrfToken = $('meta[name="csrf-token"]').attr('content');

//             // Create an object to hold your headers
//             var headers = {
//                 'X-CSRF-TOKEN': csrfToken
//             };

//             $.ajax({
//                 type: "DELETE",
//                 url: 'posts/' + postId + '/comments/' + comment,
//                 headers: headers, // Include the headers object in your AJAX request
//                 success: function(response) {
//                     if (response.message) {
//                         Swal.fire(
//                             'Deleted!',
//                             'Comment has been deleted.',
//                             'success'
//                         ).then(function() {
//                             // Reload or refresh the page or perform any other action
//                             location.reload();
//                         });
//                     }
//                 },
//                 error: function(err) {
//                     console.error("Error deleting comment:", err);

//                     // Display an error message using SweetAlert
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Error',
//                         text: 'An error occurred while deleting the comment',
//                     });
//                 }
//             });
//         }
//     });
// }

//load data in model posts and comments
$(document).ready(function() {
    $(".view-comments-button").click(function() {

        var postId = $(this).data("post-id");
        console.log(postId);

        var image = @json(auth()->user()->image_path); // Serialize the user object to JSON
        var name = @json(auth()->user()->f_name); // Serialize the user object to JSON
        var authUser = @json(auth()->user()); // Serialize the user object to JSON
        $.ajax({
            type: "GET",
            url: 'posts/' + postId,
            success: function(data) {
                 console.log(data);

                var post = data.post;
                var commentsHtml = '';
                var createdTime = moment(post.created_at).fromNow();
 

                    if(post.user.image_path != null){

                        var postUserimagePathParts = post.user.image_path.split('/head-family');
                        var imageNamePostUser = postUserimagePathParts.pop(); // Get the last part of the path (the image file name)
                        var imageOfPostUser = '{{ asset('') }}' + postUserimagePathParts  + imageNamePostUser; //
    
    
                    }else{
                        var imageOfPostUser = '{{ asset('images/admin.svg') }}';  
                    }

                    $(".modal-body .lft-img").html('<img src="' + imageOfPostUser + '" alt="' + post.user.f_name + '">');
                // Populate post author's information and content
                // var image = image ? image : "{{ asset('images/admin.svg') }}";
                // $(".modal-body .lft-img").html('<img src="' + image + '" alt="' + name + '">');

                $(".modal-body h4").text(post.user.f_name);
                $(".modal-body  #both").html(createdTime + '<span>.</span><i class="fa-solid fa-earth-americas"></i>');

                $(".modal-body .inr-dis-data p").text(post.post_message);

                // Display post images or videos if they exist
                if (post.docs && post.docs.length > 0) {
                     console.log(post.docs+'pstdoc');
                    var docsHtml = '<div style="margin-top:10px;">';
                    var docsArray = JSON.parse(post.docs);
                    var docsPathArray = JSON.parse(post.docs_path);

                    docsArray.forEach(function(doc, index) {
                        // Check if it's an image or video based on file extension
                        var docPath = docsPathArray[index];
                        console.log(docPath);


                        if (doc.match(/\.(jpeg|jpg|gif|png|mp4)$/)) {
                            if (doc.endsWith('.mp4')) {
                                // Extract the video path similar to how you extracted the image path
                                var videoPathParts = docPath.split('/head-family');
                                var videoName = videoPathParts.pop(); // Get the last part of the path (the video file name)
                                var videoPath = videoPathParts.join('/') + '/' + videoName; // Reconstruct the path without the extra part

                                // Use the video HTML element for videos with the adjusted path
                                docsHtml += '<video controls><source src="' + videoPath + '" type="video/mp4"></video>';
                            } else {
                                // Extract the image path for images
                                var imagePathParts = docPath.split('/head-family');
                                var imageName = imagePathParts.pop(); // Get the last part of the path (the image file name)
                                var imagePath = '{{ asset('') }}' + imagePathParts + imageName; // Reconstruct the path without the extra part




                                // Display images with <img> tag
                                docsHtml += '<img src="' + imagePath + '" alt="Image">';
                            }
                        }
                    });

                    docsHtml += '</div>';
                    $(".modal-body .inr-dis-data p").append(docsHtml);
                }

                // Function to capitalize the first letter of each word in a string
                function capitalizeWords(string) {
                    return string.split(' ').map(function(word) {
                        return word.charAt(0).toUpperCase() + word.slice(1);
                    }).join(' ');
                }

                // Display comments with user data and delete buttons
                if (post.comments.length === 0) {
                    commentsHtml = '<p>No comments yet</p>';
                }else{
                   post.comments.forEach(function(comment) {
                   console.log(comment);
                    // Extract the image path
                   


                    if(comment.user.image_path != null){

                        var imagePathParts = comment.user.image_path.split('/head-family');
                        var imageName = imagePathParts.pop(); // Get the last part of the path (the image file name)
                        var imagePath = '{{ asset('') }}' + imagePathParts + imageName; // Reconstruct the path without the extra part


                    }else{
                        var imagePath = '{{ asset('images/admin.svg') }}';  
                    }



                    var highlightedComment = comment.comment ? '<span style="color: #67727e; margin:7px;">' + comment.comment + '</span>' : '';
                    var capitalizedComment = comment.comment ? '<span style="color: #67727e; margin:7px;">' + capitalizeWords(comment.comment) + '</span>' : '';

                    var createdTimeComment = moment(comment.created_at).fromNow();



                    commentsHtml += '<div class="first-comnt">';
                    commentsHtml += '<div class="inr-connents-for">';
                    commentsHtml += '<img src="' + imagePath + '"  alt="' + comment.user.f_name + '">';
                    commentsHtml += '<p>' + comment.user.f_name + '</p>';
                    commentsHtml += '<p>' + createdTimeComment + '</p>';
                    if (authUser.id === comment.user.id) {

                        commentsHtml += '<button class="delete-comment-button delete" data-bs-toggle="modal" data-bs-target="#commentModal" data-post-id="' + post.id + '" data-comment-id="' + comment.id + '"><i class="fa fa-trash"></i></button>';

                    }

                    commentsHtml += '</div>';
                    commentsHtml += '<div class="inr-dis-comment">';
                    commentsHtml += '<p><span>' + comment.user.email + '</span>' + highlightedComment;

                    // Delete button for comments authored by the logged-in user
                    // if (authUser.id === comment.user.id) {

                    //     commentsHtml += '<button class="delete-comment-button delete" data-post-id="' + post.id + '" data-comment-id="' + comment.id + '"><img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}"></button>';


                    // }

                    commentsHtml += '</p>';
                    commentsHtml += '</div>';
                    commentsHtml += '</div>';
                });
            }
                // Update the modal with the fetched post and comments

                var $inrComntsModl = $(".modal-body .inr-comnts-modl");
                  $inrComntsModl.html(commentsHtml);

                // Check if the row count is more than 3 and add a class accordingly
                $inrComntsModl.html(commentsHtml);

                if ($inrComntsModl.find(".first-comnt").length > 3) {
                    $inrComntsModl.addClass("scroll-comnts"); // Replace 'your-class-name' with the actual class name you want to add
                }

                // $('.modal-body .inr-comnts-modl').empty();
                $(".modal-body .inr-comnts-modl").html(commentsHtml);



                 // Clear modal body

                // Add click event handler for delete buttons
                $(".delete-comment-button").click(function() {
                    var postId = $(this).data("post-id");
                    var comment = $(this).data("comment-id");
                    deleteComment(postId, comment);
                });

                // $(".modal-body .inr-comnts-modl").empty();


            },

            error: function(err) {
                console.error("Error fetching post and comments:", err);
            }
        });
    });
});


// script.js
document.addEventListener('input', function (e) {
    if (e.target && e.target.tagName === 'TEXTAREA') {
        adjustTextArea(e.target);
    }
});

function adjustTextArea(textarea) {
    textarea.style.height = 'auto'; // Reset the height to auto
    textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to fit the content

    // If the text area is empty, set the height to 0
    if (textarea.value === '') {
        textarea.style.height = '0';
    }
}


</script>

<script>

$(document).ready(function() {
    $(".read-more").click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var $commentText = $this.siblings(".comment-text");

        if ($commentText.hasClass("collapsed")) {
            $commentText.removeClass("collapsed");
            $this.text("Read less");
            // Expand to show all content
            $commentText.css("max-height", "none");
        } else {
            $commentText.addClass("collapsed");
            $this.text("Read more");
            // Collapse to show at most 4 lines (adjust max-height as needed)
            $commentText.css("max-height", "8em"); // 4 lines with 2em line height
        }
    });
});


</script>


