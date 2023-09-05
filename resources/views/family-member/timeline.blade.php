<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
 <style>
    ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
 </style>

</head>

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Timeline</h4>
			<ul class="timeline">

                @foreach($data as $key=>$post)
         <li> <h4> {{ ucfirst($post->post_message) }} </h4>

        <p>{{ $post->created_at }}</p>

        <p><h6>Posted by</h6><p>{{ $post->f_name }}</p>
         @if ($post->image_path)
            <h4><img src="{{ asset($post->image_path) }}" height="30" width="30" alt="Profile Image" id="existing-image-preview"></h4>
        @else
            <img src="{{ asset('images/admin.svg') }}" height="30" width="30" alt="Default Profile Image" id="existing-image-preview">
        @endif

<!-- Include print preview for images and videos -->

@if ($post->docs && $post->docs_path)
    @php
        $imageNames = json_decode($post->docs, true);
        $imagePaths = json_decode($post->docs_path, true);
    @endphp

    @if ($imageNames && $imagePaths)
        <div style="display: flex; flex-direction: row;">
            @foreach ($imagePaths as $index => $imagePath)
                @php
                    $extension = pathinfo($imageNames[$index], PATHINFO_EXTENSION);
                @endphp

                <div style="margin-right: 10px;"> <!-- Adjust margin as needed -->
                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ asset($imagePath) }}" alt="Image" width="50" height="50">
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


    </li>

    <section style="background-color: #eee;">
        <div class="card">
          <div class="card-body">


          <div class="w-full">
                        @foreach ($post->comments()->latest()->get() as $comment)
                          @foreach ($comment->user()->latest()->get() as $user)

                            <div class="w-full p-4 duration-500">
                                <div class="flex items-center rounded-lg bg-white p-4 shadow-md shadow-indigo-50">
                                    <div>


                                    <h4>{{ ucfirst($comment->comment) }}</h4>
                                    <p class="text-sm font-semibold text-gray-400">by {{ $user->f_name }}</p>
                                    @if ($user->image_path)
            <h4><img src="{{ asset($user->image_path) }}" height="30" width="30" alt="Profile Image" id="existing-image-preview"></h4>
        @else
            <img src="{{ asset('images/admin.svg') }}" height="30" width="30" alt="Default Profile Image" id="existing-image-preview">
        @endif


                                        <p class="text-sm font-semibold text-gray-400">{{ $comment->created_at }}</p>
                                        @if (auth()->user()->id === $user->id)
                                    <form action="{{ route('post.comments.destroy', [$post->id, $comment->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                @endif

                                                </div>
                                </div>
                            </div>
                        @endforeach
                        @endforeach

                    </div>

          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

          <form action="{{ route('post.comments', $post->id) }}" class="flex justify-between space-x-2"
                            method="POST">
                            @csrf

            <div class="d-flex flex-start w-100">

              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" name="content"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>

            <div class="float-end mt-2 pt-1">
              <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
            </div>

         </form>

          </div>
          </div>

</section>
@endforeach

			</ul>
		</div>
	</div>
</div>

