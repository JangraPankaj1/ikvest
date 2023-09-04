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
    <li>
     <a target="_blank" href="{{ route('postShow', $post->id) }}"
                                class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ ucfirst($post->post_message) }}
                            </a>
        <p>{{ $post->created_at }}</p>
        <p><h5>Posted by</h5><p>{{ $post->f_name }}</p>

        <!-- Include print preview for images and videos -->
        @if ($post->docs)
            <div>
                @php
                    $extension = pathinfo($post->docs, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('images/' . $post->docs) }}" alt="Image" width="200">
                @elseif (in_array($extension, ['mp4', 'webm']))
                    <video controls width="200">
                        <source src="{{ asset('images/' . $post->docs) }}" type="video/mp4">
                    </video>
                @endif
            </div>
        @endif
    </li>
@endforeach



			</ul>
		</div>
	</div>
</div>

