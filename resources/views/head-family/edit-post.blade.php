@extends('layouts.master')
@section('main-content')
<style>
        #edit-post-preview-container {
            display: flex;
            flex-wrap: wrap;
        }

        #edit-post-preview-container {
            margin: 10px;
        }
</style>
    <div class="wrapper for-create-event">
        <section>
            <div class="main-back-bnr">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-banner">
                                <h1>Edit Event</h1>
                                <p><a href="{{ route('get.timeline.head') }}"><span>View Event</span> </a>>> New Event</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-all-page-back-image-family">
            <section>
                <div class="container">
                    <div class="inr-create-event">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inr-uploads-events">
                                 <form id = "thisForm"  class="formRegister" action="{{ route('post.update',$post->id) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                      <textarea placeholder="Enter Discription" name="post_message">{{$post->post_message}} </textarea>
                                            <div class="error">
                                                @error('post_message')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        <div class="upload-files">
                                            <div class="add-pic">
                                                <img src="{{asset('web-images/add-to-photos.svg')}}" />
                                                <input type="file" name="image[]" accept=".mp4" id="edit-post-image" multiple>
                                                   <div class="col-md-12 mb-2">

                                                    @if ($post->docs_path)
                                                     @php
                                                        $images = json_decode($post->docs); // Decode the JSON array
                                                        $imagePaths = json_decode($post->docs_path); // Decode the JSON array
                                                      @endphp
                                                      @if (is_array($images) && is_array($imagePaths) && count($images) === count($imagePaths))
                                                      @for ($i = 0; $i < count($images); $i++)

                                                      <img src="{{ asset($imagePaths[$i]) }}" height="50"width="50"alt="Image">
                                                          @endfor

                                                        @endif
                                                        @endif
                                                        <div id="edit-post-preview-container" style="display: none;">

                                                </div>
                                                </div>

                                                 <span>Add Photos/Videos</span>
                                            </div>

                                        </div>

                                        <div class="bottom-publish">
                                        <a href="{{ url()->previous() }}">Cancel</a>
                                                 <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M4.5498 15C4.5498 20.7781 9.22173 25.45 14.9998 25.45C20.7779 25.45 25.4498 20.7781 25.4498 15C25.4498 9.22198 20.7779 4.55005 14.9998 4.55005C9.22173 4.55005 4.5498 9.22198 4.5498 15ZM6.2498 15C6.2498 10.1581 10.1579 6.25005 14.9998 6.25005C19.8417 6.25005 23.7498 10.1581 23.7498 15C23.7498 19.842 19.8417 23.75 14.9998 23.75C10.1579 23.75 6.2498 19.842 6.2498 15Z"
                                                        fill="white" stroke="white" stroke-width="0.5" />
                                                    <path
                                                        d="M9.59961 14.15H9.34961V14.4V15.6V15.85H9.59961H20.3996H20.6496V15.6V14.4V14.15H20.3996H9.59961Z"
                                                        fill="white" stroke="white" stroke-width="0.5" />
                                                    <path
                                                        d="M14.4004 9.34998H14.1504V9.59998V20.4V20.65H14.4004H15.6004H15.8504V20.4V9.59998V9.34998H15.6004H14.4004Z"
                                                        fill="white" stroke="white" stroke-width="0.5" />
                                                </svg>Publish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection

