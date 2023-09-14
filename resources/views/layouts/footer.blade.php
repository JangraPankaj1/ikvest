 <!-----------------Footer --------------------->
 <footer>
            <div class="main-ftr">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-md-4">
                            <div class="ftr-logo">
                                <a href="#">
                                    <img src="{{asset('images/IkVest-Logo.svg')}}" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('web-images/defam-logo.svg') }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="adders-ftr">
                                <h4>Address</h4>
                                <a href="#">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/marker.svg') }}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>2399 Wolff Extensions South Dakota, 39505 USA</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="adders-ftr contact">
                                <h4>Contact Us</h4>
                                <a href="tel:9876 5431 236">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/phone.svg') }}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>9876 5431 236</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="mailto:ian.knight@gmail.com">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/envelope.svg')}}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>ian.knight@gmail.com</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="social-icon-ftr adders-ftr">
                                <h4>Socials</h4>
                                <a href="#">
                                    <img src="{{ asset('web-images/facebook.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/twitter.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/instagram.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/pinterest.svg')}}" /> </a>
                            </div>
                        </div>
                    </div>
                    <div class="main-copy-right">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="copy-right-left">
                                    <p>Copyright © 2023 Ikvest Pvt Ltd. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="copy-right-right">
                                    <a href="#">
                                        Ikvest Terms & conditions
                                    </a>
                                    <a href="#">Defam Terms & conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-----------------end Footer --------------------->

        <!-- Initialize Swiper -->

<script>
    if( jQuery(".testimonial, .mySwiper").length ){
        var swiper = new Swiper(".testimonial, .mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
    }
</script>


<?php if(Auth::check()){ ?>
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

                $(".modal_swiper").empty();
                var post = data.post;
                var commentsHtml = '';
                var createdTime = moment(post.created_at).fromNow();


                    if(post.user.image_path != null){

                        var postUserimagePathParts = post.user.image_path.split('/head-family');
                        var imageNamePostUser = postUserimagePathParts.pop(); // Get the last part of the path (the image file name)
                        var imageOfPostUser = '{{ asset('') }}' + postUserimagePathParts  + imageNamePostUser; //


                    }else{
                        var imageOfPostUser = '{{ asset("images/admin.svg") }}';
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

                    var docsHtml = ' <div class="swiper-wrapper">';
                    var docsArray = JSON.parse(post.docs);
                    var docsPathArray = JSON.parse(post.docs_path);

                    docsArray.forEach(function(doc, index) {
                        // Check if it's an image or video based on file extension
                        var docPath = docsPathArray[index];

                        if (doc.match(/\.(jpeg|jpg|gif|png|mp4)$/)) {

                            docsHtml += '<div class="swiper-slide">';
                            if (doc.endsWith('.mp4')) {
                                // Extract the video path similar to how you extracted the image path
                                var videoPathParts = docPath.split('/head-family');
                                var videoName = videoPathParts.pop(); // Get the last part of the path (the video file name)
                                var videoPath = videoPathParts.join('/') + '/' + videoName;

                                docsHtml += '<video controls><source src="' + videoPath + '" type="video/mp4"></video>';
                            } else {

                                var imagePathParts = docPath.split('/head-family');
                                var imageName = imagePathParts.pop();

                                var imagePath = '{{ asset('') }}' + imagePathParts + imageName;

                                docsHtml += '<img src="' + imagePath + '" alt="Image">';
                            }
                            docsHtml += '</div> ';
                        }
                    });

                    docsHtml += '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div><div class="swiper-pagination"></div>';
                    $(".modal-body .inr-dis-data .modal_swiper").append(docsHtml);
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

                    if(comment.user.image_path != null){

                        var imagePathParts = comment.user.image_path.split('/head-family');
                        var imageName = imagePathParts.pop();
                        var imagePath = '{{ asset('') }}' + imagePathParts + imageName;
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

                    commentsHtml += '</div><div class="inr-dis-comment"><p><span>' + comment.user.email + '</span>' + highlightedComment;

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
                    $inrComntsModl.addClass("scroll-comnts");
                }

                $(".modal-body .inr-comnts-modl").html(commentsHtml);

                // Add click event handler for delete buttons
                $(".delete-comment-button").click(function() {
                    var postId = $(this).data("post-id");
                    var comment = $(this).data("comment-id");
                    deleteComment(postId, comment);
                });

                setTimeout(function () {
                    new Swiper(".modal_swiper", {
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        }
                    });
                }, 500);
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
    textarea.style.height = textarea.scrollHeight + 'px';

    if (textarea.value === '') {
        textarea.style.height = '0';
    }
}



//read more for comments
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

    $(document).on( 'click', '.for-all-comments-show .btn-close', function () {
        $(".modal_swiper").empty();
    });


    $(".close-btn-sidebar, .member-show").click(function () {
        $(".main-side-data").toggle();
    });
});
</script>
<?php } ?>
