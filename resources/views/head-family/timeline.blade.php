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
                                <div class="member-show">
                                    <img src="{{ asset('web-images/mdi_family-tree.svg') }}" height="90" width="90" alt="Default Profile Image" id="existing-image-preview">

                                    <p><span>12</span>Family Members</p>
                                </div>
                            </div>
                            <!-- <div class="upr-event">
                                    <div class="row">
                                         <div class="inr-search-event">
                                            <form>
                                                <input type="text" placeholder="Search...">
                                                <button>Search
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.51865 8.28755L13.7313 12.5037C14.0733 12.8458 14.0733 13.4011 13.7313 13.7432C13.5608 13.9143 13.3366 14 13.1123 14C12.8881 14 12.6639 13.9143 12.4929 13.7432L8.28022 9.52704C7.42291 10.1374 6.37744 10.5 5.24536 10.5C2.34855 10.5 0 8.1493 0 5.25C0 2.3507 2.34855 0 5.24536 0C8.14215 0 10.4907 2.3507 10.4907 5.25C10.4907 6.38313 10.1284 7.42961 9.51865 8.28755ZM7.75005 7.75691L8.09386 7.27305C8.51812 6.67629 8.74231 5.97672 8.74192 5.25004C8.74192 3.32022 7.17327 1.75004 5.245 1.75004C3.31673 1.75004 1.7481 3.32022 1.7481 5.25004C1.7481 7.17984 3.31673 8.75004 5.245 8.75004C5.97126 8.75004 6.6703 8.5256 7.26646 8.10122L7.75005 7.75691Z"
                                                            fill="white" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------end Profile Name --------------------->

        <!-----------------end sticky Profile Name --------------------->
       
        <section>
            <div class="container">
                <div class="new-event">
                    <a href="{{ route('post') }}">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path d="M4.5498 15C4.5498 20.7781 9.22173 25.45 14.9998 25.45C20.7779 25.45 25.4498 20.7781 25.4498 15C25.4498 9.22192 20.7779 4.54999 14.9998 4.54999C9.22173 4.54999 4.5498 9.22192 4.5498 15ZM6.2498 15C6.2498 10.1581 10.1579 6.24999 14.9998 6.24999C19.8417 6.24999 23.7498 10.1581 23.7498 15C23.7498 19.8419 19.8417 23.75 14.9998 23.75C10.1579 23.75 6.2498 19.8419 6.2498 15Z" fill="white" stroke="white" stroke-width="0.5" />
                                <path d="M9.6001 14.15H9.3501V14.4V15.6V15.85H9.6001H20.4001H20.6501V15.6V14.4V14.15H20.4001H9.6001Z" fill="white" stroke="white" stroke-width="0.5" />
                                <path d="M14.3999 9.34998H14.1499V9.59998V20.4V20.65H14.3999H15.5999H15.8499V20.4V9.59998V9.34998H15.5999H14.3999Z" fill="white" stroke="white" stroke-width="0.5" />
                            </svg>
                            New Event</button></a>
                </div>
                               
                <div class="inner-profile-data">
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
                    @foreach($data as $key=>$post)
                    @foreach ($post->user()->latest()->get() as $user)

                    
                    <div class="full-data-profile">
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
                                        <p>{{ $post->created_at->diffForHumans() }}<span>.</span><img src="{{ asset('web-images/vecotr.svg') }}" /></p>
                                    </div>
                                    @if (auth()->user()->id === $user->id)

                                    <form action="{{ route('post.delete', $post->id) }}" class="flex justify-between space-x-2" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" ><img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}"></button>
                                        </form>
                                        @endif
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
                                            <input type="text" name="content" placeholder="Write a comment..." required />

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
                                                @foreach ($post->comments()->latest()->take(2)->get() as $comment)
                                                @foreach ($comment->user()->latest()->get() as $user)
                                                <div class="accordion-body">
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
                                                            <form action="{{ route('comments.destroy.without.model', [$post->id, $comment->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="delete" ><img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}"></button>
                                                            </form>
                                                            @endif
                                                           
                                                        </div>
                                                        <div class="inr-dis-comment">

                                                            <p><span>{{$user->email }}</span>
                                                                @if ($comment->comment)

                                                                {{ ucfirst($comment->comment) }}
                                                                @else
                                                                No comments on this post.

                                                                @endif
                                                            </p>
                                                           
                                                         
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="view-comments-button" data-post-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View all comments</h4>



                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endforeach

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
                                        <p id="post"><!-- here is fetch posts -->
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

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
<script>


function deleteComment(postId, comment) {

   // Get the CSRF token value from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Create an object to hold your headers
    var headers = {
        'X-CSRF-TOKEN': csrfToken
    };

    $.ajax({
        type: "DELETE",
        url: 'posts/' + postId + '/comments/' + comment,
        headers: headers, // Include the headers object in your AJAX request
        success: function(response) {
           

        if(response.message){
            swal({
                title: "Success",
                text: "Comment deleted successfully",
                icon: "success",
            }).then(function() {
                // Reload or refresh the page or perform any other action
                location.reload();
            });
        }
          
        },
        error: function(err) {
            console.error("Error deleting comment:", err);

            // Display an error message using SweetAlert
            swal({
                title: "Error",
                text: "An error occurred while deleting the comment",
                icon: "error",
            });
        }
    });
}


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
                var post = data.post;
                var commentsHtml = '';
                var createdTime = moment(post.created_at).fromNow();


                 // Display comments with user data and delete buttons
                

                // Populate post author's information and content
                var image = image ? image : "{{ asset('images/admin.svg') }}";
                $(".modal-body .lft-img").html('<img src="' + image + '" alt="' + name + '">');

                $(".modal-body h4").text(name);
                $(".modal-body  #both").html(createdTime + '<span>.</span><img src="{{ asset('web-images/vecotr.svg') }}">');

                $(".modal-body .inr-dis-data p").text(post.post_message);

                // Display post images or videos if they exist
                if (post.docs && post.docs.length > 0) {
                    var docsHtml = '<div>';
                    var docsArray = JSON.parse(post.docs);
                    var docsPathArray = JSON.parse(post.docs_path);

                    docsArray.forEach(function(doc, index) {
                        // Check if it's an image or video based on file extension
                        var docPath = docsPathArray[index];

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
                                var imagePath = imagePathParts.join('/') + '/' + imageName; // Reconstruct the path without the extra part 

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
                  
                    // Extract the image path
                    var imagePathParts = comment.user.image_path.split('/head-family');
                    var imageName = imagePathParts.pop(); // Get the last part of the path (the image file name)
                    var imagePath = imagePathParts.join('/') + '/' + imageName; // Reconstruct the path without the extra part 
                    var highlightedComment = comment.comment ? '<span style="color: #67727e; margin:7px;">' + comment.comment + '</span>' : '';
                    var capitalizedComment = comment.comment ? '<span style="color: #67727e; margin:7px;">' + capitalizeWords(comment.comment) + '</span>' : '';

                    var createdTimeComment = moment(comment.created_at).fromNow();
                    

                    commentsHtml += '<div class="first-comnt">';
                    commentsHtml += '<div class="inr-connents-for">';
                    commentsHtml += '<img src="' + imagePath + '" alt="' + comment.user.f_name + '">';
                    commentsHtml += '<p>' + comment.user.f_name.toUpperCase() + '</p>';
                    commentsHtml += '<p>' + createdTimeComment + '</p>';
                    if (authUser.id === comment.user.id) {

                        commentsHtml += '<button class="delete-comment-button delete" data-post-id="' + post.id + '" data-comment-id="' + comment.id + '"><img class="delete" src="{{ asset('web-images/material-symbols_delete.svg')}}"></button>';
 
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
                $(".modal-body .inr-comnts-modl").html(commentsHtml);

                // Add click event handler for delete buttons
                $(".delete-comment-button").click(function() {
                    var postId = $(this).data("post-id");
                    var comment = $(this).data("comment-id");
                    deleteComment(postId, comment);
                });
            },
            error: function(err) {
                console.error("Error fetching post and comments:", err);
            }
        });
    });
});

</script>
