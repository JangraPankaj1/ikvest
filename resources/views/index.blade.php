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
                                    <p>A retired family with 2 main goals.</p>
                                    <ol>

                                        <li>
                                        Provide a process to share family histories, both past and present.
                                        </li>
                                        <li>
                                        Provide a mechanism to learn investing for family security and prosperity.
                                        </li>
                                    </ol>
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
                                    <p>We are retired Professional Business people with over 50 years experience in the global industrial market place.</p>
                                    <p>
                                    Investors and retail traders in the global stock markets. We manage our families investment portfolios and actively trade the stocks.
                                    </p>
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
                                <h2> Why this website? </h2>
                                <p>To provide an opportunity for everyone to actively participate in the history of ones own family hierarchy.</p>
                                <strong>By:-</strong>
                                <ul>
                                      <li>
                                      Viewing, creating and updating their own or part of their Family Tree.
                                      </li>
                                      <li>
                                      Sharing important events and information, knowing who’s who.
                                      </li>

                                </ul>
                               <strong> And</strong>
                                <ul>
                                    <li> Learning the processes of investing for family security and prosperity. </li>

                                </ul>


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
