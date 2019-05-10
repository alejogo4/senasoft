@extends('layouts.master')


@section('content')

    <!--begin header -->
    <header class="header">

        <!--begin nav -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <!--begin container -->
            <div class="container">

                @yield('menu',View::make('layouts.components.menu'))

            </div>
            <!--end container -->

        </nav>
        <!--end nav -->

    </header>
    <!--end header -->

    <!--begin home section -->
    <section class="home-section" id="home_wrapper">

        <div class="home-section-overlay"></div>

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-8-->
                <div class="col-md-10 col-md-offset-1 text-center">
                    <img src="images/logo_sena.png" alt="Logo SENA" class="logo-sena">     
                    <h1>SENASOFT 2019  | MEDELLÍN</h1>
                    <p>En Medellín estamos preparando el evento SenaSoft 2019, el mayor encuentro tecnológico organizado por el SENA </p>
                  
                    @yield('countdown',View::make('layouts.components.countdown'))

                </div>
                <!--end col-md-8-->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end home section -->

    <!--begin section-grey -->
    <section class="section-grey" id="about">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">

                    <h2 class="section-title">How It Works</h2>

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col-md-12 -->

                <!--begin col-md-4 -->
                <div class="col-md-4">

                    <div class="main-services">

                        <img src="http://placehold.it/100x100" class="width-100" alt="pic">

                        <h3>Search Oportunities</h3>

                        <p>Curabitur quam etsum lacus etsumis nulat iaculis ets vitae etsum nisle varius sed aliquam ets vitae dictis netsum.</p>

                    </div>

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4">

                    <div class="main-services">

                        <img src="http://placehold.it/100x100" class="width-100" alt="pic">

                        <h3>Reach Clients</h3>

                        <p>Curabitur quam etsum lacus etsumis nulat iaculis ets vitae etsum nisle varius sed aliquam ets vitae dictis netsum.</p>

                    </div>

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4">

                    <div class="main-services">

                        <img src="http://placehold.it/100x100" class="width-100" alt="pic">

                        <h3>Get Rewarded</h3>

                        <p>Curabitur quam etsum lacus etsumis nulat iaculis ets vitae etsum nisle varius sed aliquam ets vitae dictis netsum.</p>

                    </div>

                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end section-grey -->

    <!--begin features -->
    <section class="section-white">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 margin-bottom-40 text-center">

                    <h2 class="section-title">Amazing Features</h2>

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col-md-12 -->

                <!--begin col-md-4 -->
                <div class="col-md-4 padding-top-40">

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_right">
                            <span class="fa fa-laptop features_icons"></span>
                        </div>

                        <div class="text_align_right">
                            <h4>Responsive Layout</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_right">
                            <span class="fa fa-code features_icons"></span>
                        </div>

                        <div class="text_align_right">
                            <h4>Clean Code</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_right">
                            <span class="fa fa-camera-retro features_icons"></span>
                        </div>

                        <div class="text_align_right">
                            <h4>Retina Ready</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4 wow slideInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">

                    <img src="images/features-iphone.png" alt="picture" class="width-100">

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4 padding-top-40">

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_left">
                            <span class="fa fa-leaf features_icons"></span>
                        </div>

                        <div class="text_align_left">
                            <h4>Modern Design</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_left">
                            <span class="fa fa-rocket features_icons"></span>
                        </div>

                        <div class="text_align_left">
                            <h4>Premium Features</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                    <!--begin features_item -->
                    <div class="features_item">

                        <div class="dropcaps_left">
                            <span class="fa fa-comments features_icons"></span>
                        </div>

                        <div class="text_align_left">
                            <h4>24/7 Support</h4>
                            <p>Quis autem velis etis netsum etims quis voluptate velit nihil est netsum et quam donecs netis de etsum nisle lorem.</p>
                        </div>

                    </div>
                    <!--end features_item -->

                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end features -->

    <!--begin video-wrapper -->
    <section class="video-wrapper">

        <div class="video-wrapper-overlay"></div>

        <div class="shape-image-top"></div>

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center">

                    <!--begin popup-gallery-->
                    <div class="popup-gallery">
                        <a class="popup4 video-icon" href="https://www.youtube.com/watch?v=FPfQMVf4vwQ"><i class="fa fa-play"></i></a>
                    </div>
                    <!--end popup-gallery-->

                    <h3 class="video-title white">Watch Demo Video<br><span>Amazing Features, Unlimited Possibilities.</span></h3>

                </div>
                <!--end col-md-12-->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end video-wrapper -->

    

    <!--begin team section -->
    <section class="top-shape-wrapper">

        <!--begin top-shape section -->
        <div class="top-shape" id="team">

            <!--begin container-->
            <div class="container">

                <!--begin row-->
                <div class="row">

                    <!--begin col-md-12 -->
                    <div class="col-md-12 text-center">

                        <h2 class="section-title">The Team Behind Nova</h2>

                        <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                    </div>
                    <!--end col-md-12 -->

                    <!--begin team-item -->
                    <div class="col-sm-12 col-md-4">

                        <div class="team-item">

                            <img src="http://placehold.it/200x200" class="team-img" alt="pic">

                            <h3>JOHNATHAN HAWKINS</h3>

                            <div class="team-info"><p>Head of SEO</p></div>

                            <p>Johnathan is our  co-founder and has developed search strategies for a variety of clients for over 5 years.</p>

                            <ul class="team-icon">

                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>

                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>

                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>

                                <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>

                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->

                    <!--begin team-item -->
                    <div class="col-sm-12 col-md-4">

                        <div class="team-item">

                            <img src="http://placehold.it/200x200" class="team-img" alt="pic">

                            <h3>ALEXANDRA SMITHS</h3>

                            <div class="team-info"><p>SEO Specialist</p></div>

                            <p>Graduating with a degree in Spanish, English and French, Alexandra has always loved writing.</p>

                            <ul class="team-icon">

                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>

                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>

                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>

                                <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>

                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->

                    <!--begin team-item -->
                    <div class="col-sm-12 col-md-4">

                        <div class="team-item">

                            <img src="http://placehold.it/200x200" class="team-img" alt="pic">

                            <h3>ANDRES JOHANSON</h3>

                            <div class="team-info"><p>Marketing Manager</p></div>

                            <p>Andres fell in love with marketing at the university and looks forward to being part of this industry for many years.</p>

                            <ul class="team-icon">

                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>

                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>

                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>

                                <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>

                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->

                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </div>
        <!--end top-shape section -->

    </section>
    <!--end team section -->

    <!--begin gallery section -->
    <section class="section-lyla" id="gallery">

        <!--begin container -->
        <div class="container-fluid ">

            <!--begin row -->
            <div class="row">

                <!--begin col md 12 -->
                <div class="col-md-12 text-center">

                    <h2 class="section-title white">Categorias de participación</h2>

                    <p class="section-subtitle white">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col md 12 -->

                <!--begin col md 12 -->
                <div class="gallery-item-wrapper padding-top-30">

                    <!--begin owl carousel -->
                    <div id="owl2" class="owl-carousel owl-theme">

                        <div>
                            <img src="images/showcase1.jpg" alt="showcase" class="gallery-show">
                        </div>

                        <div>
                            <img src="images/showcase2.jpg" alt="showcase" class="gallery-show">
                        </div>

                        <div>
                            <img src="images/showcase3.jpg" alt="showcase" class="gallery-show">
                        </div>

                        <div>
                            <img src="images/showcase4.jpg" alt="showcase" class="gallery-show">
                        </div>

                        <div>
                            <img src="images/showcase5.jpg" alt="showcase" class="gallery-show">
                        </div>

                        <div>
                            <img src="images/showcase6.jpg" alt="showcase" class="gallery-show">
                        </div>

                    </div>
                    <!--end owl carousel -->

                    <div class="owl-dots">
                        <div class="owl-dot active"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                    </div>
                </div>
                <!--end col md  12-->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end gallery section -->

    <!--begin partners section -->
    <section class="section-grey partners-paddings">

        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <h4 class="our-partners-title">Our Amazing Partners<br><span>We’ve built apps featured on:</span></h4>
                </div>

                <div class="col-md-9">

                    <!--begin partners-mentions -->
                    <ul class="partners-mentions">

                        <li><img src="images/award4a.png" alt="CSS Awards"></li>

                        <li><img src="images/award1a.png" alt="Awwwards"></li>

                        <li><img src="images/award5.png" alt="CSS Winner"></li>

                        <li><img src="images/award3a.png" alt="CSS Design Awards"></li>

                    </ul>
                    <!--end partners-mentions -->

                </div>

            </div>

        </div>

    </section>
    <!--end partners section -->

    <!--begin services section -->
    <section class="section-white small-padding-bottom" id="features">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center padding-bottom-10">

                    <h2 class="section-title">Amazing Features</h2>

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col-md-12 -->

            </div>
            <!--end row -->

            <!--begin row -->
            <div class="row">

                <!--begin col-md-4-->
                <div class="col-md-4">

                    <div class="feature-box light-green wow fadeIn" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-tools"></i>

                        <div class="feature-box-text">

                            <h4>Support 24/7</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4-->
                <div class="col-md-4">

                    <div class="feature-box light-blue wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-users"></i>

                        <div class="feature-box-text">

                            <h4>User Friendly</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

                <!--begin col-md 4-->
                <div class="col-md-4">

                    <div class="feature-box orange wow fadeIn" data-wow-delay="0.75s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-bell"></i>

                        <div class="feature-box-text">

                            <h4>Notifications</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

            <!--begin row -->
            <div class="row">

                <!--begin col-md-4-->
                <div class="col-md-4">

                    <div class="feature-box dark-green wow fadeIn" data-wow-delay="1s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-chat"></i>

                        <div class="feature-box-text">

                            <h4>Chat With Friends</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4-->
                <div class="col-md-4">

                    <div class="feature-box dark-blue wow fadeIn" data-wow-delay="1.25s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-world"></i>

                        <div class="feature-box-text">

                            <h4>Accesibility</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4-->
                <div class="col-md-4">

                    <div class="feature-box light-red wow fadeIn" data-wow-delay="1.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">

                        <i class="pe-7s-piggy"></i>

                        <div class="feature-box-text">

                            <h4>Cost Control</h4>

                            <p>Utise wisi enim minim veniam, quis tation ullamcorper suscipit et loboti nisl consequat nihis.</p>

                        </div>

                    </div>
                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 padding-top-40">

                    <img src="images/iphone-v.png" alt="home-iphone" class="extra-image width-100 wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">

                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end services section -->

    <!--begin newsletter section -->
    <section class="section-lyla-shape" id="newsletter-section">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center padding-top-60 padding-bottom-20">

                    <h3 class="white-text">Seen enough? We are currently in the closed beta.<br>
                        Please enter your email to join the waiting list.</h3>

                </div>
                <!--end col-md-12 -->

                <!--begin col-md-12-->
                <div class="col-md-12">

                    <!--begin newsletter_form_wrapper -->
                    <div class="newsletter_form_wrapper">

                        <!--begin newsletter_form_box -->
                        <div class="newsletter_form_box">

                            <!--begin success_box -->
                            <p class="newsletter_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>
                            <!--end success_box -->

                            <!--begin newsletter-form -->
                            <form id="newsletter-form" class="newsletter-form" action="php/newsletter.php" method="post">

                                <input id="email_newsletter" type="email" name="nf_email" placeholder="Enter Your Email Address">

                                <input type="submit" value="GET STARTED!" id="submit-button-newsletter">

                            </form>
                            <!--end newsletter-form -->

                        </div>
                        <!--end newsletter_form_box -->

                    </div>
                    <!--end newsletter_form_wrapper -->

                </div>
                <!--end col-md-12 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end newsletter section -->

    <!--begin pricing section -->
    <section class="section-white bottom-shape z-100" id="pricing">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center padding-bottom-40">

                    <h2 class="section-title">Great Pricing Plans</h2>

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col-md-12 -->

                <!--begin col-md-4-->
                <div class="col-md-4 col-sm-4">

                    <div class="price-box-white">

                        <ul class="pricing-list">

                            <li class="price-title">FREE</li>

                            <li class="price-value">$0</li>

                            <li class="price-subtitle">Per Month</li>

                            <li class="price-text">24/7 Support</li>

                            <li class="price-text">50 Gb Bandwidth</li>

                            <li class="price-text">1 User Acount</li>

                            <li class="price-tag"><a href="#">GET STARTED</a></li>

                        </ul>

                    </div>

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4 col-sm-4">

                    <div class="price-box-grey">

                        <ul class="pricing-list">

                            <li class="price-title">REGULAR</li>

                            <li class="price-value">$29</li>

                            <li class="price-subtitle">Per Month</li>

                            <li class="price-text">24/7 Support</li>

                            <li class="price-text">200 Gb Bandwidth</li>

                            <li class="price-text">Unlimited Experiences</li>

                            <li class="price-text">10 Themes</li>

                            <li class="price-text">Weekly Updates</li>

                            <li class="price-tag"><a href="#">GET STARTED</a></li>

                        </ul>

                    </div>

                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->
                <div class="col-md-4 col-sm-4">

                    <div class="price-box-blue">

                        <ul class="pricing-list">

                            <li class="price-title white-text">GOLD</li>

                            <li class="price-value white-text">$99</li>

                            <li class="price-subtitle white-text">Per Month</li>

                            <li class="price-text white-text">24/7 Support</li>

                            <li class="price-text white-text">Unlimited Bandwidth</li>

                            <li class="price-text white-text">50 Gb Bandwidth</li>

                            <li class="price-text white-text">Daily Updates</li>

                            <li class="price-text white-text">10 User Acounts</li>

                            <li class="price-text white-text">Custom Hosting</li>

                            <li class="price-text white-text">Unlimited Acces</li>

                            <li class="price-tag"><a href="#">GET STARTED</a></li>

                        </ul>

                    </div>

                </div>
                <!--end col-md-4 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end pricing section -->

    <!--begin section-white -->
    <section class="section-white small-padding-top">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-6 wow slideInLeft" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">

                    <img src="images/benefits.png" class="width-100" alt="pic">

                </div>
                <!--end col-sm-6-->

                <!--begin col-md-6-->
                <div class="col-md-6 padding-top-20">

                    <h3>Get ready to discover all the benefits and secrets of a perfect launch</h3>

                    <p>Velis demo enim ipsam voluptatem quia voluptas sit aspernatur netsum lorem fugit, sed quia magni dolores eos qui ratione sequi nesciunt neque et poris ratione sequi enim quia tempor magni.</p>

                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum lorem fugit, sed quia magni dolores eos qui ratione sequi.</p>

                    <ul class="benefits">
                        <li><i class="fa fa-check"></i> Quia magni netsum eos qui ratione sequi.</li>
                        <li><i class="fa fa-check"></i> Venis ratione sequi enim quia tempor magni.</li>
                        <li><i class="fa fa-check"></i> Enim ipsam voluptatem quia voluptas.</li>
                        <li><i class="fa fa-check"></i> Ratione nes sequi nesciunt neque.</li>
                    </ul>

                    <a href="#download-app" class="btn-lyla scrool">Download App</a>

                </div>
                <!--end col-md-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-white-->

    <!--begin testimonials section -->
    <section class="section-grey">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-10 -->
                <div class="col-md-8 col-md-offset-2">

                    <!--begin owl carousel -->
                    <div id="owl1" class="owl-carousel owl-theme">

                        <!--begin testim-inner -->
                        <div class="testim-inner">

                            <img src="http://placehold.it/200x200" alt="testimonials" class="testim-img">

                            <p>The attention of a traveller, should be particularly turned, in the first place, to the various works of Nature, to mark the distinctions of the climates he may explore, and to offer such useful observations on the different productions as may occur.</p>

                            <h6>Jennifer Smith<span class="job-text"> - Web Designer</span></h6>

                        </div>
                        <!--end testim-inner -->

                        <!--begin testim-inner -->
                        <div class="testim-inner">

                            <img src="http://placehold.it/200x200" alt="testimonials" class="testim-img">

                            <p>The attention of a traveller, should be particularly turned, in the first place, to the various works of Nature, to mark the distinctions of the climates he may explore, and to offer such useful observations on the different productions as may occur.</p>

                            <h6>John Doe<span class="job-text"> -  General Manager</span></h6>

                        </div>
                        <!--end testim-inner -->

                        <!--begin testim-inner -->
                        <div class="testim-inner">

                            <img src="http://placehold.it/200x200" alt="testimonials" class="testim-img">

                            <p>The attention of a traveller, should be particularly turned, in the first place, to the various works of Nature, to mark the distinctions of the climates he may explore, and to offer such useful observations on the different productions as may occur.</p>

                            <h6>Alexandra Smith<span class="job-text"> - App Magazine Editor</span></h6>

                        </div>
                        <!--end testim-inner -->

                    </div>
                    <!--end owl carousel -->

                    <!--begin owl carousel -->
                    <div class="owl-dots">

                        <div class="owl-dot active"><span></span></div>

                        <div class="owl-dot"><span></span></div>

                        <div class="owl-dot"><span></span></div>

                    </div>
                    <!--end owl carousel -->

                </div>
                <!--end-col-md-10 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end testimonials section -->

    <!--begin download-app-wrapper -->
    <section class="download-app-wrapper" id="download-app">

        <div class="download-app-wrapper-overlay"></div>

        <div class="shape-grey-image-top"></div>

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-5-->
                <div class="col-md-6 padding-top-100">

                    <h2 class="title-download-app-padding white-text">Get The App Now!</h2>

                    <p class="white-text">Curabitur quam etsum lacus etsumis nulatis etsumised vitae nisledita variustimuslis loremis sedit  feugiat ligula aliquam etsimus dictimelis etis dinetsumitis ipsum netsum etim quias nets ligula.</p>

                    <a href="#" class="btn-download-app"><span class="fa fa-apple"></span><p><small>Download On</small><br>App Store</p></a>

                    <a href="#" class="btn-download-app"><span class="fa fa-android"></span><p><small>Get It On</small><br>Google Play</p></a>

                    <a href="#" class="btn-download-app last"><span class="fa fa-windows"></span><p><small>Get It From</small><br>Windows</p></a>

                </div>
                <!--end col-md-5-->

                <!--begin col-md-7-->
                <div class="col-md-6 wow slideInRight" data-wow-delay="0.15s" style="visibility: visible; animation-delay: 0.15s; animation-name: slideInRight;">

                    <img src="images/download-app-iphone.png" alt="picture" class="download-app-iphone width-100">

                </div>
                <!--end col-md-7-->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end download-app-wrapper -->

    <!--begin section-white -->
    <section class="section-white small-paddings">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin fun-facts-box-->
                <div class="col-sm-3 fun-facts-box">

                    <div class="fun-facts-icon">
                        <i class="fa fa-trophy"></i>
                    </div>

                    <div class="fun-facts-text">

                        <h3 class="fun-facts-title">Trusted By 5K</h3>
                        <p class="fun-facts-subtitle">App Of The Year</p>

                    </div>

                </div>
                <!--end fun-facts-box -->

                <!--begin fun-facts-box-->
                <div class="col-sm-3 fun-facts-box">

                    <div class="fun-facts-icon">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="fun-facts-text">

                        <h3 class="fun-facts-title">11500</h3>
                        <p class="fun-facts-subtitle">Total Downloads</p>

                    </div>

                </div>
                <!--end fun-facts-box -->

                <!--begin fun-facts-box-->
                <div class="col-sm-3 fun-facts-box">

                    <div class="fun-facts-icon">
                        <i class="fa fa-heart"></i>
                    </div>

                    <div class="fun-facts-text">

                        <h3 class="fun-facts-title">5500</h3>
                        <p class="fun-facts-subtitle">Active Members</p>

                    </div>

                </div>
                <!--end fun-facts-box -->

                <!--begin fun-facts-box-->
                <div class="col-sm-3 fun-facts-box">

                    <div class="fun-facts-icon">
                        <i class="fa fa-rocket"></i>
                    </div>

                    <div class="fun-facts-text">

                        <h3 class="fun-facts-title">1000+</h3>
                        <p class="fun-facts-subtitle">Diferent Premium Avatars</p>

                    </div>

                </div>
                <!--end fun-facts-box -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </section>
    <!--end white-grey -->

    <!--begin faq section -->
    <section class="section-white small-padding-bottom" id="pqr">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">

                    <img src="http://placehold.it/555x421" alt="picture" class="width-100">

                </div>
                <!--end col-sm-6-->

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10">

                    <h3>Preguntas Frecuentes</h3>

                    <!--begin panel-group -->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <!--begin panel-default -->
                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingOne">

                                <h4 class="panel-title">

                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="icon icon-rocket panel-icon"></i> What's the difference between organic vs. paid results?
                                    </a>

                                </h4>

                            </div>

                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                                <div class="panel-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis reprehenderit ets quis velit.</p>
                                </div>

                            </div>

                        </div>
                        <!--end panel-default -->

                        <!--begin panel-default -->
                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingTwo">

                                <h4 class="panel-title">

                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="icon icon-prize-award panel-icon"></i> Should I optimize my domain name to include keywords?
                                    </a>

                                </h4>

                            </div>

                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                                <div class="panel-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis reprehenderit ets quis velit.</p>
                                </div>

                            </div>

                        </div>
                        <!--end panel-default -->

                        <!--begin panel-default -->
                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingThree">

                                <h4 class="panel-title">

                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="icon icon-present-gift panel-icon"></i> What is the difference between indexed and crawling?
                                    </a>

                                </h4>

                            </div>

                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                                <div class="panel-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis reprehenderit ets quis velit.</p>
                                </div>

                            </div>

                        </div>
                        <!--end panel-default -->

                        <!--begin panel-default -->
                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingFour">

                                <h4 class="panel-title">

                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="icon icon-present-gift panel-icon"></i> What is the difference between indexed and crawling?
                                    </a>

                                </h4>

                            </div>

                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">

                                <div class="panel-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis reprehenderit ets quis velit.</p>
                                </div>

                            </div>

                        </div>
                        <!--end panel-default -->

                    </div>
                    <!--end panel-group -->

                </div>
                <!--end col-sm-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end faq section -->

    <!--begin contact -->
    <section class="section-white no-padding-bottom" id="contact">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6 -->
                <div class="col-md-6">

                    <h4>Get in touch</h4>

                    <!--begin success message -->
                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>
                    <!--end success message -->

                    <!--begin contact form -->
                    <form id="contact-form" class="contact" action="php/contact.php" method="post">

                        <input class="contact-input white-input" required="" name="contact_names" placeholder="Full Name*" type="text">

                        <input class="contact-input white-input" required="" name="contact_email" placeholder="Email Adress*" type="email">

                        <input class="contact-input white-input" required="" name="contact_phone" placeholder="Phone Number*" type="text">

                        <textarea class="contact-commnent white-input" rows="2" cols="20" name="contact_message" placeholder="Your Message..."></textarea>

                        <input value="Send Message" id="submit-button" class="contact-submit" type="submit">

                    </form>
                    <!--end contact form -->

                </div>
                <!--end col-md-6 -->

                <!--begin col-md-6 -->
                <div class="col-md-6">

                    <h4>How to find us</h4>

                    <iframe class="contact-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.9050207912896!2d-0.14675028449633118!3d51.514958479636384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ad554c335c1%3A0xda2164b934c67c1a!2sOxford+St%2C+London%2C+UK!5e0!3m2!1sen!2sro!4v1485889312335" width="600" height="270" style="border:0" allowfullscreen></iframe>

                    <h5>Head Office</h5>

                    <p class="contact-info"><i class="fa fa-map-o"></i> 10 Oxford Street, London, UK, E1 1EC</p>

                    <p class="contact-info"><i class="fa fa-envelope-o"></i> <a href="mailto:contact@email.com">office@amazing-apps.co.uk</a></p>

                    <p class="contact-info"><i class="fa fa-phone"></i> +44 987 654 321</p>

                </div>
                <!--end col-md-6 -->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end contact-->

    <!--begin footer -->
    <div class="footer">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">

                    <p>Copyright © 2018 Nova. Designed by <a href="https://themeforest.net/user/epic-themes/portfolio?ref=Epic-Themes" target="_blank">Epic-Themes</a></p>

                    <!--begin footer_social -->
                    <ul class="footer_social">

                        <li>
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-skype"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-dribble"></i>
                            </a>
                        </li>

                    </ul>
                    <!--end footer_social -->

                </div>
                <!--end col-md-6 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </div>
    <!--end footer -->

@endsection

