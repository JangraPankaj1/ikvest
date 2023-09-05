
@extends('layouts.without-header')
@section('main-content-without-header')
<head>

<style>
        #preview-container {
            display: flex;
            flex-wrap: wrap;
        }

        #preview-container img {
            margin: 10px;
        }
</style>
</head>
   <div class="wrapper">
        <section>
            <div class="bck-img-inr">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="lft-side-login">
                                <div class="inr-join-us">
                                    <h1>Come join us,</h1>
                                    <h4>to share your family tree and history.</h4>
                                    <div class="inr-plus-login">
                                        <h2>Plus,</h2>
                                        <h4>you will have an option to learn about investing
                                            for your family and your own future.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="right-login-form">
                                <img src="{{ asset('images/IkVest-Logo.svg') }} " class="icon-logo-top" />
                                <h2>Add Post</h2>
                                <form id = "thisForm" id="upload-image" class="formRegister" action="{{ route('posts') }}" method="post"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="sign-up-form">

                                        <label>Post
                                      <textarea id="description" name="post" placeholder="Enter a detailed description here" class="form-control" ></textarea>
                                         <div class="error">
                                                @error('post')
                                                    {{ $message }}
                                                @enderror
                                         </div>

                                        </label>

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="image[]" accept=".pdf, .xml, .csv, .mp4" id="image" multiple>
                                             </div>
                                         </div>
                                        <div class="col-md-12 mb-2">


                                            <div id="preview-container" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="submit-btn">Add Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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


