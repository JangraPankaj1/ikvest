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
        var url = '{{ route("post.delete", ":id") }}';
        url = url.replace(':id', postId);
        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
             url: url,
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

        var url = '{{ route("comments.destroy", ["postId" => ":postId", "comment" => ":commentId"]) }}';
url = url.replace(':postId', postId).replace(':commentId', comment);

        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
            url: url,
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

    var url = '{{ route("comments.destroy", ["postId" => ":postId", "comment" => ":commentId"]) }}';
url = url.replace(':postId', postId).replace(':commentId', comment);


        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
            url: url,
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
        var url = '{{ route("post.get", ":id") }}';
        url = url.replace(':id', postId);

        $.ajax({
            type: "GET",
            url : url,
            // url: 'posts/' + postId,
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

                    $(".modal-body .lft-img").html('<img src="' + imageOfPostUser + '" alt="' + post.user.f_name + post.user.l_name +'">');
                // Populate post author's information and content
                // var image = image ? image : "{{ asset('images/admin.svg') }}";
                // $(".modal-body .lft-img").html('<img src="' + image + '" alt="' + name + '">');

                $(".modal-body h4").text(post.user.f_name  + ' '+ post.user.l_name);
                $(".modal-body  #both").html(createdTime + '<span>.</span><i class="fa-solid fa-earth-americas"></i>');





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
                    commentsHtml += '<p>' + comment.user.f_name + ' '+ comment.user.l_name +'</p>';
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

    $(".close-btn-sidebar, .mamber-list").click(function () {
        $(".main-side-data").toggle();
    });
});

//lightbox
lightbox.option({
'resizeDuration': 200,
'wrapAround': true
})

</script>

<script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                    $('#preview-image-before-upload').show(); // Show the new image preview
                    $('#existing-image-preview').hide(); // Hide the existing image preview
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

</script>
<script type="text/javascript">
            $(document).ready(function (e) {
                $('#image').change(function(){
                    // Clear any previous previews
                    $('#preview-container').html('');

                    // Loop through selected files and create previews
                    for (let i = 0; i < this.files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            let preview = $('<img>').attr('src', e.target.result).css('max-width', '200px');
                            $('#preview-container').append(preview);
                        }
                        reader.readAsDataURL(this.files[i]);
                    }

                    $('#preview-container').show(); // Show the container for the new image previews
                });
            });
</script>

<script>
    //search functionality code sidebar
    $(document).ready(function() {
    var $searchInput = $('#search-input');
    var $errorMessage = $('#error-message');

    // Function to handle the search
    function performSearch() {
        // Get the search query
        var searchQuery = $searchInput.val().toLowerCase();

        // Send an AJAX request to your search route
        $.ajax({
            url: '{{ route('search.family.member') }}',
            type: 'GET',
            data: { search: searchQuery },
            success: function(response) {
                console.log(response);
                // Update the profile-mmbr-data div with the filtered family members
                displaySearchResults(response.users);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    // Listen for clicks on the search button
    $('.searchButton').on('click', performSearch);

    // Listen for keyup events on the search input field
    $searchInput.on('keyup', performSearch);
});



function displaySearchResults(users) {

    // Clear the current content of profile-mmbr-data
    $('.profile-mmbr-data').empty();

    // Check if the 'users' array is not empty
    if (users.length > 0) {
        // Iterate through the users and create HTML for each user
        users.forEach(function (user) {
            var userHtml = '<div class="flex-main-itms">';
            userHtml += '<div class="pic-lft">';

            var memberProfileUrl = "{{ route('member.profile', ['id' => ':id']) }}".replace(':id', user.id);



            var imageOfsearchUser = user.image_path ? '{{ asset('') }}' + user.image_path : '{{ asset("images/admin.svg") }}';

            userHtml += '<a href="' + memberProfileUrl + '">';
            userHtml += '<img src="' + imageOfsearchUser + '" class="profile" alt="Profile Image" id="existing-image-preview">';
            userHtml += '</a>';
            userHtml += '</div>';
            userHtml += '<div class="right-data">';

            userHtml += '<div style="margin-top:6px;">';
            userHtml += '<a style="color:black;" href="' + memberProfileUrl + '">' + user.f_name;

            if (user.l_name) {
                userHtml += ' ' + user.l_name ;
            }

            userHtml += '</a>';
            userHtml += '</div>';

            // if(user.bdy_date){
            //     userHtml += '<a href="' + memberProfileUrl + '"><p>'+ user.bdy_date+'</p></a>';

            // }
            userHtml += '</div>';
            userHtml += '</div>';

            // Append the user HTML to profile-mmbr-data
            $('.profile-mmbr-data').append(userHtml);
        });
    } else {
        // If 'users' array is empty, you can display a message or take other actions
        $('.profile-mmbr-data').html('<p>No Family Member found.</p>');
    }
}


// edit profile hide and show maritaial status

$(document).ready(function() {
    // Initial state based on the selected option
    updateFieldsVisibility();

    // Listen for changes in the select element
    $('#marital-status').on('change', function() {
        updateFieldsVisibility();
    });

    // Function to update the visibility of input fields based on the selected option
    function updateFieldsVisibility() {
        var selectedOption = $('#marital-status').val();

        if (selectedOption === 'Unmarried') {
            $('#current-spouse').hide();
            $('#marriage-anniversary').hide();
        } else {
            $('#current-spouse').show();
            $('#marriage-anniversary').show();
        }
    }
});


//delete investment post
$(document).ready(function() {
// When the delete button is clicked
$(".delete-button-investment").click(function() {
    // Store the item ID from the data attribute
    var postId = $(this).data("id");
    console.log(postId);

    // When the modal's delete button is clicked
      $(document).on('click', '#exampleModal .modal-body button.modelDelete', function() {
        var url = '{{ route("investment.delete", ":id") }}';
        url = url.replace(':id', postId);
        // Submit the delete form via AJAX
        $.ajax({
            type: 'Delete',
             url: url,
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token if needed
            },
            success: function(response) {
                  console.log(response);

                // Handle success, e.g., show a success message
                if (response.message) {
                    Swal.fire(
                        'Deleted!',
                        'Investment Post has been deleted.',
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

// edit post upload preview
$(document).ready(function (e) {
    $('#edit-post-image').change(function () {
        // Clear any previous previews
        $('#edit-post-preview-container').html('');

        // Loop through selected files and create previews
        for (let i = 0; i < this.files.length; i++) {
            let reader = new FileReader();
            reader.onload = (e) => {
                let file = this.files[i];
                let preview;

                if (file.type.startsWith('image/')) {
                    // Display image preview
                    preview = $('<img>').attr('src', e.target.result).css('max-width', '200px');
                } else if (file.type.startsWith('video/')) {
                    // Display video preview
                    preview = $('<video>').attr('src', e.target.result)
                                          .attr('controls', 'true')
                                          .css('max-width', '200px');

                    // Display video name
                    let videoName = $('<p>').text(file.name);
                    $('#edit-post-preview-container').append(videoName);
                }

                // Append the preview to the container
                $('#edit-post-preview-container').append(preview);
            }
            reader.readAsDataURL(this.files[i]);
        }

        $('#edit-post-preview-container').show(); // Show the container for the new previews
    });
});


  //add post upload preview
  $(document).ready(function (e) {
    $('#image_add_post').change(function () {
        // Clear any previous previews
        $('#preview-post-container').html('');

        // Loop through selected files and create previews
        for (let i = 0; i < this.files.length; i++) {
            let reader = new FileReader();
            reader.onload = (e) => {
                let file = this.files[i];
                let preview;

                if (file.type.startsWith('image/')) {
                    // Display image preview
                    preview = $('<img>').attr('src', e.target.result).css('max-width', '75px');
                } else if (file.type.startsWith('video/')) {
                    // Display video preview
                    preview = $('<video>').attr('src', e.target.result)
                                          .attr('controls', 'true')
                                          .css('max-width', '75px');

                    // Display video name
                    let videoName = $('<p>').text(file.name);
                    $('#preview-post-container').append(videoName);
                }

                // Append the preview to the container
                $('#preview-post-container').append(preview);
            }
            reader.readAsDataURL(this.files[i]);
        }

        $('#preview-post-container').show(); // Show the container for the new previews
    });
});


// $(document).ready(function (e) {
//     $('#image_add_post').change(function () {
//         // Clear any previous previews
//         $('#preview-post-container').html('');

//         // Define the maximum allowed file size in bytes (e.g., 10 MB)
//         const maxFileSize = 100 * 1024 * 1024; // 100 MB

//         // Define maximum allowed counts for photos and videos
//         const maxPhotoCount = 20;
//         const maxVideoCount = 10;

//         // Initialize counters
//         let photoCount = 0;
//         let videoCount = 0;

//         // Loop through selected files and create previews
//         for (let i = 0; i < this.files.length; i++) {
//             const file = this.files[i];
//             const fileSize = file.size;

//             if (fileSize > maxFileSize) {
//                 // Display an error message for files exceeding the maximum size
//                 alert('File "' + file.name + '" exceeds the maximum allowed size of 100 MB.');
//                 continue; // Skip this file
//             }

//             if (file.type.startsWith('image/') && photoCount < maxPhotoCount) {
//                 // Display image preview
//                 const preview = $('<img>').attr('src', URL.createObjectURL(file)).css('max-width', '200px');
//                 $('#preview-post-container').append(preview);
//                 photoCount++;
//             } else if (file.type.startsWith('video/') && videoCount < maxVideoCount) {
//                 // Display video preview
//                 const preview = $('<video>').attr('src', URL.createObjectURL(file))
//                     .attr('controls', 'true')
//                     .css('max-width', '200px');

//                 // Display video name
//                 const videoName = $('<p>').text(file.name);
//                 $('#preview-post-container').append(preview, videoName);
//                 videoCount++;
//             } else {
//                 // Display an error message for exceeding the photo or video limits
//                 alert('This types of files not allowed.');
//             }
//         }

//         $('#preview-post-container').show(); // Show the container for the new previews
//     });
// });





</script>

<?php } ?>
