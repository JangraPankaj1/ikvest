
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

    <div class="mb-16 flex flex-wrap">
    <div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Timeline</h4>
			<ul class="timeline">

    <li>

    <h3> {{ ucfirst($post->post_message) }} </h3>
        <p> {{ $post->created_at }} </p>
        <p><h5>Posted by</h5><p>{{ $user->f_name }}</p>


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



			</ul>
		</div>
	</div>
</div>


        <div class="w-full shrink-0 grow-0 lg:w-6/12 lg:pl-6 bg-slate-50 rounded-md p-2">



            @auth
                <div
                    class="container d-flex justify-content-center align-items-center w-50 mt-6 bg-slate-200 p-4 rounded-md">
                    <div class="">
                        <form action="{{ route('post.comments', $post->id) }}" class="flex justify-between space-x-2"
                            method="POST">
                            @csrf
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="content" id="content" placeholder="Comment" required>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Post
                            </button>
                        </form>
                    </div>

                </div>
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
                 <div class="w-full">
                        @foreach ($post->comments()->latest()->get() as $comment)
                            <div class="w-full p-4 duration-500">
                                <div class="flex items-center rounded-lg bg-white p-4 shadow-md shadow-indigo-50">
                                    <div>



                                        <p class="text-sm font-semibold text-gray-400">{{ $comment->comment }}</p>
                                        <form action="{{ route('post.comments.destroy', [$post->id, $comment->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="mt-6 rounded-lg bg-red-400 px-4 py-2 text-sm tracking-wider text-white outline-none hover:bg-red-300">Delete</button>

                                                    <button
                                                    class="mt-6 rounded-lg bg-red-400 px-4 py-2 text-sm tracking-wider text-white outline-none hover:bg-red-300">Edit</button>
                                                    </form>

                                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            @endauth
        </div>

    </div>

