@extends('layouts.master')
@section('main-content')


    <div class="wrapper">
        <div class="main-all-page-back-image">
            <!-----------------Who we are --------------------->
            <section>
                <div class="main-who-we-are">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="who-we-are-left">
                                    <h1>Who are We?</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur. Lacus magna eget velit eu blandit
                                        facilisis
                                        nunc est. Ut gravida netus vel viverra risus sodales risus. Amet penatibus
                                        aenean
                                        donec aliquam rhoncus. Sed quis est dolor ac quisque. Nunc mi amet justo odio
                                        volutpat nunc. Vel vestibulum massa lectus quam convallis. Duis massa accumsan
                                        viverra ligula malesuada mauris adipiscing. Donec faucibus consequat varius in
                                        interdum consectetur purus. Turpis dui diam ultrices velit libero viverra amet
                                        placerat volutpat.
                                        Mauris lorem laoreet vel sit. Commodo a scelerisque eget.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="who-we-are-right">
                                    <img src="{{ asset('web-images/who-group.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-----------------end Who we are --------------------->

            <!-----------------what do we do --------------------->
            <section>
                <div class="main-we-do">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="we-do-left">
                                    <img src="{{ asset('web-images/we-do.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="we-do-right">
                                    <h2>What do we Do.</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur. Gravida ac tempor ut diam mi purus porta
                                        sagittis. Egestas quis dictum enim enim arcu sapien pellentesque arcu sed. Quam
                                        morbi sed lacus vitae. Purus velit ultricies sed feugiat porta tortor morbi
                                        tellus. Eget dui nibh diam mollis ut. Cum enim imperdiet cum massa duis velit
                                        quis id proin. Platea nibh dictumst scelerisque turpis amet consequat.
                                        Scelerisque semper blandit suscipit tincidunt quis sem vel. Vel nisl at amet
                                        porta pharetra dolor in. Purus morbi turpis vitae neque pharetra. Quam a
                                        curabitur in cursus ac cras. Pellentesque </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section>
            <div class="main-why-site">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="why-site-left">
                                <h2>Why this website?</h2>
                                <p>Lorem ipsum dolor sit amet consectetur. Vulputate consectetur vel magna vel
                                    egestas. In nunc sed hendrerit nulla vel. Ut eget aliquam volutpat sed diam
                                    adipiscing. Ut elementum aliquam varius euismod auctor sagittis. Tincidunt urna
                                    risus venenatis mi aliquet a pretium faucibus. Scelerisque ornare est habitant
                                    mauris tristique. Sollicitudin tellus felis nisl pharetra tellus sit sit. Augue
                                    vel sed felis euismod sed fames eget tincidunt. Sollicitudin quis nisl dictumst
                                    sollicitudin turpis proin nisl. Diam diam blandit sit feugiat sagittis integer
                                    malesuada. Nec nunc eu erat eu.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-site-right">
                                <img src="{{ asset('web-images/website.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection
