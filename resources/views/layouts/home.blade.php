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
<section class="home-section" id="home">

    <div class="home-section-overlay">
        <video id="bg_video"  title="Centro de servicios y gestión empresarial" autoplay="true"  muted="muted">
            <source src="{{asset('files/videos/metas 2018.mp4')}}" type="video/mp4">
        </video>
    </div>

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-8-->
            <div class="col-md-10 col-md-offset-1 text-center">
                <img src="images/logo_sena.png" alt="Logo SENA" class="logo-sena">
                <h1>SENASOFT 2019 | MEDELLÍN</h1>
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
<section class="section-grey" id="schedule">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 text-center">

                <h2 class="section-title">Itinerario del evento</h2>

                <p class="section-subtitle">El cronograma del evento estará sujeto a modificaciones, este es un cronograma inicial de las participación Senasoft 2019</p>

            </div>
            <!--end col-md-12 -->
            <ul class="nav nav-tabs mt-4 mb-4 justify-content-center">
                <li class="active"><a data-toggle="tab" href="#dia1">Martes</a></li>
                <li><a data-toggle="tab" href="#dia2">Miercoles</a></li>
                <li><a data-toggle="tab" href="#dia3">Jueves</a></li>
                <li><a data-toggle="tab" href="#dia4">Viernes</a></li>
            </ul>
            <div class="tab-content">
                <div id="dia1" class="tab-pane fade in active">
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>06:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Llegada a Medellín.</h4>
                            <p>Traslado a los hoteles desde el aeropuerto o terminal.</p>
                            <p>10:00 a.m primer transporte.</p>
                            <p>12:00 a.m segundo transporte.</p>
                            <p>2:00 p.m tercer transporte.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>12:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el hotel.</h4>
                            <p>Se realiza el registro de todos los integrantes.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>02:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado desde el hotel a lugar del evento.</h4>
                            <p>Quienes lleguen despues de las 2.00 p.m. al aeropuerto, llegan al lugar del evento.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>03:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el evento y entrega de equipos.</h4>
                            <p>Se reciben todos los equipos que desean registrar.</p>
                        </div>
                    </div>
                
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>06:00 PM</time></div>
                        <div class="col-md-10">   
                            <h4>Inaguración al evento</h4>
                            <p>Se realiza la inaguración de SenaSoft 2019 - Medellín</p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>07:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado y cena.</h4>
                            <p>Se regresa al lugar de hospedaje para tomar la cena.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>08:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el evento y entrega de equipos segunda parte.</h4>
                            <p>Se reciben todos los equipos que desean registrar.</p>
                        </div>
                    </div>
                </div>
                <div id="dia2" class="tab-pane fade">
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>06:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado desde el hotel a lugar del evento.</h4>
                            <p>Quienes lleguen despues de las 2.00 p.m. al aeropuerto, llegan al lugar del evento.</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>07:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Charla para aprendices e instructores.</h4>
                            <p>Se realiza una charla introductoria en general para todos.</p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>08:30 AM</time></div>
                        <div class="col-md-10">
                            <h4>Refrigerio.</h4>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>09:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Competencia Aprendices.</h4>
                            <p>Inicia la competencia; <b>Todos los instructores deben asistir a una conferencia en auditorio.<b></p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>12:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Almuerzo</h4>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>02:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Workshops para los instructores.</h4>
                            <div class="speaker">
                                <img src="images/speaker4.jpg" alt="Jack Christiansen">
                            </div>
                            <p>Workshop Software - Ambiente #1.</p>
                            <div class="speaker">
                                <img src="images/speaker4.jpg" alt="Jack Christiansen">
                            </div>
                            <p>Workshop Infraestructura - Ambiente #2</p>
                            <div class="speaker">
                                <img src="images/speaker4.jpg" alt="Jack Christiansen">
                            </div>
                            <p>Workshop Contenidos Digitales - Ambiente #3.</p>
                            
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>04:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Reunión de Instructores por área.</h4>
                            <p>Software - Ambiente #1.</p>
                            <p>Infraestructura - Ambiente #2</p>
                            <p>Contenidos Digitales - Ambiente #3.</p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>06:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Finalización de competencia.</h4>
                            <p>.</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>04:00 PM</time></div>
                        <div class="col-md-10">
                            <div class="speaker">
                                <img src="img/speakers/6.jpg" alt="Willow Trantow">
                            </div>
                            <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                            <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                        </div>
                    </div>
                </div>
                <div id="dia3" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="dia4" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
        </div>


    </div>


    </div>
    <!--end row -->

    </div>
    <!--end container -->

</section>
<!--end section-grey -->

<!--begin gallery section -->
<section class="section-lyla" id="category">

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
                        <img src="images/categorias/algoritmos.png" alt="showcase" class="gallery-show">
                    </div>

                    <div>
                        <img src="images/categorias/animacion3d.png" alt="showcase" class="gallery-show">
                    </div>

                    <div>
                        <img src="images/categorias/audiovisuales.png" alt="showcase" class="gallery-show">
                    </div>

                    <div>
                        <img src="images/categorias/basesdedatos.png" alt="showcase" class="gallery-show">
                    </div>

                    <div>
                        <img src="images/categorias/ideatic.png" alt="showcase" class="gallery-show">
                    </div>

                    <div>
                        <img src="images/categorias/moviles.png" alt="showcase" class="gallery-show">
                    </div>
                    <div>
                        <img src="images/categorias/multimedia.png" alt="showcase" class="gallery-show">
                    </div>
                    <div>
                        <img src="images/categorias/redes.png" alt="showcase" class="gallery-show">
                    </div>
                    <div>
                        <img src="images/categorias/videojuegos.png" alt="showcase" class="gallery-show">
                    </div>
                    <div>
                        <img src="images/categorias/web.png" alt="showcase" class="gallery-show">
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


<!--begin team section -->
<section class="top-shape-wrapper">

    <!--begin top-shape section -->
    <div class="top-shape" id="history">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">

                    <h2 class="section-title">Historial Senasoft 2019</h2>

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

                </div>
                <!--end col-md-12 -->

                <!--begin team-item -->
                <div class="col-sm-12 col-md-4">

                    <div class="team-item">

                        <img src="/logosenasoft/2008.jpg" class="team-img" alt="pic">

                        <h3>2008</h3>

                        <div class="team-info">
                            <p>MEDELLÍN</p>
                        </div>

                        <p>Los días 14 y 15 de mayo de 2008, se realizó en la ciudad de Medellín en el Centro de
                            Servicios y Gestión Empresarial, la primera versión de Senasoft, donde participaron
                            doscientos (200) aprendices de Software de 18 regionales del SENA</p>

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

                        <img src="/logosenasoft/2009.png" class="team-img" alt="pic">

                        <h3>2009</h3>

                        <div class="team-info">
                            <p>SEO Specialist</p>
                        </div>

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

                        <div class="team-info">
                            <p>Marketing Manager</p>
                        </div>

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



<!--begin partners section -->
<section class="section-grey partners-paddings">

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <h4 class="our-partners-title">Patrocinadores<br><span>Ejemplo:</span></h4>
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



<!--begin newsletter section -->
<section class="section-lyla-shape" id="newsletter-section">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 text-center padding-top-60 padding-bottom-20">

                <h3 class="white-text">Envianos tu email, nos contactaremos contigo.</h3>

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

                            <input id="email_newsletter" type="email" name="nf_email" placeholder="Ingresar Email">

                            <input type="submit" value="ENVIAR!" id="submit-button-newsletter">

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
<!--end newsletter section -->
</section>
<!--end testimonials section -->

<!--begin features -->
<section class="section-white" id="app">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 margin-bottom-40 text-center">

                <h2 class="section-title">Aplicación Móvil</h2>

                <p class="section-subtitle">
                    Para la estrategia de Senasoft 2019 hemos desarrollado una aplicación para facilitar el proceso de registro y evaluación de equipos <br>Esta posee unas grandes características como: </p>

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
<!--begin faq section -->
<section class="section-white small-padding-bottom" id="pqr">

    <!--begin container-->
    <div class="container">

        <!--begin row-->
        <div class="row">

            <!--begin col-md-6-->
            <div class="col-md-6 margin-top-10">

                <h4>Ubicación del evento</h4>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.255925231375!2d-75.5746813!3d6.2553016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6687d0d29c14ce12!2sCentro+De+Servicios+y+Gesti%C3%B3n+Empresarial+Sede+Administrativa!5e0!3m2!1ses!2sco!4v1557771437403!5m2!1ses!2sco" width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!--<h5>Centro de Servicios y Gestión Empresarial</h5>

                <p class="contact-info">
                    <i class="fa fa-map-o"></i> Cra. 57 #51-83, Medellín, Antioquia</p>

                <p class="contact-info"><i class="fa fa-envelope-o"></i>
                    <a href="mailto:agiraldo186@misena.edu.co">agiraldo186@misena.edu.co</a></p>

                <p class="contact-info"><i class="fa fa-phone"></i> +57 3217219988</p>-->

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
                                    <i class="icon icon-rocket panel-icon"></i> ¿Qué herramientas se van a utilizar en cada una de las categorías?
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
                                    <i class="icon icon-prize-award panel-icon"></i> ¿Cuántas personas se deben inscribir para cada una de las categorías?
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
                                    <i class="icon icon-present-gift panel-icon"></i> ¿Dónde podemos encontrar el cronograma del evento?
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
                                    <i class="icon icon-present-gift panel-icon"></i> ¿Cuál es la manera más fácil de llegar al centro de formación?
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



<!--begin footer -->
<div class="footer">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 text-center">

                <p>Copyright © 2019 SENA.</p>

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
            <!--end col-md-12 -->

        </div>
        <!--end row -->

    </div>
    <!--end container -->

</div>
<!--end footer -->

@endsection

@section("script")
    <script>
        // $(function() {
        //     $.vegas('slideshow', {
        //         delay: 7000,
        //         backgrounds: [
        //             { src: '/images/video_top_1.gif', fade: 15000 },
        //             { src: '/images/video_top_2.gif', fade: 15000 },
        //         ],
        //         loading: false
        //     })
        // });
    </script>
@endsection
