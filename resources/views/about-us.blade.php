@extends('layouts.master')
@section('main-content')

    <div class="wrapper">
        <!-----------------end Bannner --------------------->
        <section>
            <div class="main-back-bnr">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-banner">
                                <h1>About Us</h1>
                                <p><a href="{{ route('home') }}"><span>Home</span> </a>>> About us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------end Bannner --------------------->
        <div class="main-all-page-back-image">
            <section>
                <div class="container">
                    <div class="main-ikvest">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="ikvest-left">
                                    <img src="{{ asset('web-images/IkVest.png') }}" />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="ikvest-right">
                                    <h2>IKVEST</h2>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Private investment company</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/IkVest-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Portfolio Management</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/IkVest-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Retail Equities Trading</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/IkVest-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Certified Trading Processes</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/IkVest-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Education / Learning for Private Investors and Family Members</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/IkVest-tree.svg') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="main-defam">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="defam-right">
                                    <h2>DEFAM</h2>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Create and Manage the Tree</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Editing Family Changes</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Family Communications</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Build a new Family Tree</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Social Media Connections</p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="icon-list">
                                        <div class="text-for-icon">
                                            <p>Events Announcements </p>
                                        </div>
                                        <div class="icon-right">
                                            <img src="{{ asset('web-images/defam-tree.svg') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="defam-left">
                                    <img src="{{ asset('web-images/defam.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
