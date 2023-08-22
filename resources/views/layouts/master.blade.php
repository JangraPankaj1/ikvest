@include('layouts.header')
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar_inner">
                    </div>
                </div>
            </div>
            @yield('main-content')
        </div>
    @include('layouts.footer')
    @stack('js')
</body>

</html>
