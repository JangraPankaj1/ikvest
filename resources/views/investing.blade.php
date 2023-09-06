@extends('layouts.master')
@section('main-content')

 <div class="wrapper">

        <section>
            <div class="main-back-bnr">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-banner">
                                <h1>Investing</h1>
                                <p><a href="{{ route('home') }}"><span>Home</span> </a>>> Investing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------end Bannner --------------------->
       
    </div>
    @endsection
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>



