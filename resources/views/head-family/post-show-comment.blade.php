    
    <div class="mb-16 flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
            <div class="flex flex-col">
                <div class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
                    data-te-ripple-init data-te-ripple-color="light">
                    <a href="#!">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        </div>
                    </a>
                </div>
              
                <div class="flex flex-col p-4">
                    <div class="flex space-x-4 mt-6 bg-slate-200 p-2 rounded-md">
                        
                        <div class="flex flex-col">
                            <span class="text-2xl">{{ $post->post_message }}</span>
                        </div>
                    </div>
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
                                name="content" id="content" placeholder="Comment">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Post
                            </button>
                        </form>
                    </div>
                  
                </div>

                 <div class="w-full">
                        @foreach ($post->comments()->latest()->get() as $comment)
                            <div class="w-full p-4 duration-500">
                                <div class="flex items-center rounded-lg bg-white p-4 shadow-md shadow-indigo-50">
                                    <div>
                                        <!-- <div class="flex space-x-2">
                                           
                                            <h2 class="text-lg font-bold text-gray-900">{{ $comment->user->name }}</h2>
                                        </div> -->
                                        <p class="text-sm font-semibold text-gray-400">{{ $comment->comment }}</p>
                                        <form action="{{ route('post.comments.destroy', [$post->id, $comment->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="mt-6 rounded-lg bg-red-400 px-4 py-2 text-sm tracking-wider text-white outline-none hover:bg-red-300">Delete</button>
                                                    </form>

                                                    <button
                                                    class="mt-6 rounded-lg bg-red-400 px-4 py-2 text-sm tracking-wider text-white outline-none hover:bg-red-300">Edit</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            @endauth
        </div>

    </div>

