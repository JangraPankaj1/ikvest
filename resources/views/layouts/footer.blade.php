 <!-----------------Footer --------------------->
 <footer>
            <div class="main-ftr">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-md-4">
                            <div class="ftr-logo">
                                <a href="#">
                                    <img src="{{asset('images/IkVest-Logo.svg')}}" />
                                </a>
                                <a href="#">
                                    <img src="{{ asset('web-images/defam-logo.svg') }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="adders-ftr">
                                <h4>Address</h4>
                                <a href="#">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/marker.svg') }}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>2399 Wolff Extensions South Dakota, 39505 USA</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="adders-ftr contact">
                                <h4>Contact Us</h4>
                                <a href="tel:9876 5431 236">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/phone.svg') }}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>9876 5431 236</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="mailto:ian.knight@gmail.com">
                                    <div class="list-icon">
                                        <div class="icon-lft-ftr">
                                            <img src="{{ asset('web-images/envelope.svg')}}" />
                                        </div>
                                        <div class="text-for-right">
                                            <p>ian.knight@gmail.com</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="social-icon-ftr adders-ftr">
                                <h4>Socials</h4>
                                <a href="#">
                                    <img src="{{ asset('web-images/facebook.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/twitter.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/instagram.svg')}}" /> </a>
                                    <img src="{{ asset('web-images/pinterest.svg')}}" /> </a>
                            </div>
                        </div>
                    </div>
                    <div class="main-copy-right">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="copy-right-left">
                                    <p>Copyright © 2023 Ikvest Pvt Ltd. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="copy-right-right">
                                    <a href="#">
                                        Ikvest Terms & conditions
                                    </a>
                                    <a href="#">Defam Terms & conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-----------------end Footer --------------------->

        <!-- Initialize Swiper -->

<script>
    if( jQuery(".testimonial, .mySwiper").length ){
        var swiper = new Swiper(".testimonial, .mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
    }
</script>


