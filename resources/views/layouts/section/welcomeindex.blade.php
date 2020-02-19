

  


<!-- 
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth


                </div>

@endif
</div> -->






    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Secure, Cloud-based Elections</h1>
                            <p>Create an election for your school or organization in seconds. Your voters can vote from any location on any device.
</p>
                            <a href="{{route('login')}}" class="btn_2 banner_btn_1">Get Started </a>
                            <a href="{{route('register')}}" class="btn_2 banner_btn_2">Sign up for free </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner_img d-none d-lg-block">
                        <img src="welcomepage/img/banner_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end-->
       

@include('layouts.section.welcomepost')
    

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <a href="index.html" class="footer_logo_iner"> <img src="welcomepage/img/footer_logo.png" alt="#"> </a>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Contact Info</h4>
                        <p>Address : Your address goes
                            here, your demo address.
                            Bsngladesh.</p>
                        <p>Phone : +8880 44338899</p>
                        <p>Email : info@colorlib.com</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Important Link</h4>
                        <ul class="list-unstyled">
                            <li><a href=""> WHMCS-bridge</a></li>
                            <li><a href="">Search Domain</a></li>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Our Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div>
                        <h4>About Us</h4>
                        <p>Heaven fruitful doesn't over lesser days appear creeping seasons so behold bearing days open
                        </p>
                        
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">3S2N</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>





<body>
   