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
        <video id="bg_video" title="Centro de servicios y gestión empresarial" autoplay="true" muted="muted">
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
                <p class="parrafo">En Medellín estamos preparando el evento SenaSoft 2019, el mayor encuentro tecnológico organizado por
                    el SENA </p>

                @yield('countdown',View::make('layouts.components.countdown'))

            </div>
            <!--end col-md-8-->

        </div>
        <!--end row -->

    </div>
    <!--end container -->
    <img src="{{asset('images/mascota.png')}}" class="mascota" alt="Mascota Senasoft 2019">
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

                <p class="section-subtitle">El cronograma del evento estará sujeto a modificaciones, este es un
                    cronograma inicial de las participación Senasoft 2019</p>

            </div>
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#menu1">Martes</a></li>
                <li><a data-toggle="tab" href="#menu2">Miercoles</a></li>
                <li><a data-toggle="tab" href="#menu3">Jueves</a></li>
                <li><a data-toggle="tab" href="#menu4">Viernes</a></li>
            </ul>

            <div class="tab-content">
        
                <div id="menu1" class="tab-pane fade in active">
                    <h3>Menu 1</h3>
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
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
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
                            <p>Inicia la competencia; <b>Todos los instructores deben asistir a una conferencia en
                                    auditorio.<b></p>
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
                            <p>Traslado a hoteles y cena en hoteles.</p>
                        </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
            <!--end col-md-12 -->
        </div>
    </div>

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

                <h2 class="section-title white">Categorías de participación</h2>

                <p class="section-subtitle white">There are many variations of passages of Lorem Ipsum available, but
                    the majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

            </div>
            <!--end col md 12 -->

            <!--begin col md 12 -->
            <div class="gallery-item-wrapper padding-top-30">

                <!--begin owl carousel -->
                <div id="owl2" class="owl-carousel owl-theme">

                    <div>
                        <img src="images/categorias/algoritmos.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Algoritmos</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <img src="images/categorias/animacion3d.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Animación 3D</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <img src="images/categorias/audiovisuales.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Audiovisuales</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <img src="images/categorias/basesdedatos.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Bases de datos</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <img src="images/categorias/ideatic.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Ideatic</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <img src="images/categorias/moviles.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Móviles</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <img src="images/categorias/multimedia.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Multimedia</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <img src="images/categorias/redes.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Redes</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <img src="images/categorias/videojuegos.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Videojuegos</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <img src="images/categorias/web.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Web</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy, Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>
                            <button class="section-lyla btn btn-formato">
                                Lineamientos
                                <span class="fa fa-download"></span>
                            </button>
                        </div>
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

                    <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the
                        majority<br>have suffered alteration, by injected humour, or new randomised words.</p>

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

                        <img src="/logosenasoft/2009.jpg" class="team-img" alt="pic">

                        <h3>2009</h3>

                        <div class="team-info">
                            <p>CAUCA</p>
                        </div>

                        <p>Graduating with a degree in Spanish, English and French, Alexandra has always loved writing.
                        </p>

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

                        <img src="/logosenasoft/2010.jpg" class="team-img" alt="pic">

                        <h3>2010</h3>

                        <div class="team-info">
                            <p>MEDELLÍN</p>
                        </div>

                        <p>Andres fell in love with marketing at the university and looks forward to being part of this
                            industry for many years.</p>

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

                        <img src="/logosenasoft/2013.jpg" class="team-img" alt="pic">

                        <h3>2013</h3>

                        <div class="team-info">
                            <p>CAUCA</p>
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

                        <img src="/logosenasoft/2014.jpg" class="team-img" alt="pic">

                        <h3>2014</h3>

                        <div class="team-info">
                            <p>HUILA</p>
                        </div>

                        <p>Graduating with a degree in Spanish, English and French, Alexandra has always loved writing.
                        </p>

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

                        <img src="/logosenasoft/2015.JPG" class="team-img" alt="pic">

                        <h3>2015</h3>

                        <div class="team-info">
                            <p>SANTANDER</p>
                        </div>

                        <p>Andres fell in love with marketing at the university and looks forward to being part of this
                            industry for many years.</p>

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

                        <img src="/logosenasoft/2016.jpg" class="team-img" alt="pic">

                        <h3>2016</h3>

                        <div class="team-info">
                            <p>QUINDIO</p>
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

                        <img src="/logosenasoft/2017.jpg" class="team-img" alt="pic">

                        <h3>2017</h3>

                        <div class="team-info">
                            <p>VALLE</p>
                        </div>

                        <p>Graduating with a degree in Spanish, English and French, Alexandra has always loved writing.
                        </p>

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

                        <img src="/logosenasoft/2018.jpg" class="team-img" alt="pic">

                        <h3>2018</h3>

                        <div class="team-info">
                            <p>ATLÁNTICO</p>
                        </div>

                        <p>Andres fell in love with marketing at the university and looks forward to being part of this
                            industry for many years.</p>

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

            <div class="col-md-2">
                <h4 class="our-partners-title">Apoyo:</h4>
            </div>

            <div class="col-md-10">

                <!--begin partners-mentions -->
                <ul id="owl10" class="partners-mentions owl-carousel">

                    <li><img src="/logosempresas/fractal.png" alt="Fractal"></li>
                    <li><img src="/logosempresas/huellas.png" alt="Huellas"></li>
                    <li><img src="/logosempresas/gap.png" alt="GAP"></li>
                    <li><img src="/logosempresas/tyj.png" alt="T y J sas"></li>
                    <li><img src="/logosempresas/castor.png" alt="Castor"></li>
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

                <h3 class="white-text">Descargar reglamento para la competencia Senasoft 2019.</h3>

            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <a href="{{asset('files/Reglamento SENASOFT 2019.docx')}}}" class="btn btn-reglamento">Descargar Reglamento
                        <span class="fa fa-download"></span>
                    </a>

                    </a>
                </div>
            </div>
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
                    Para la estrategia de Senasoft 2019 hemos desarrollado una aplicación para facilitar el proceso de
                    registro y evaluación de equipos <br>Esta posee unas grandes características como: </p>

            </div>
            <!--end col-md-12 -->

            <!--begin col-md-4 -->
            <div class="col-md-4 padding-top-40">

                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_right">
                        <span class="fa fa-cutlery features_icons"></span>
                    </div>

                    <div class="text_align_right">
                        <h4>Horarios de alimentación</h4>
                        <p>En la aplicación puedes tener acceso a todos los horarios de alimentación.</p>
                    </div>

                </div>


                <!--end features_item -->

                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_right">
                        <span class="fa fa-users features_icons"></span>
                    </div>

                    <div class="text_align_right">
                        <h4>Horarios de los workshop</h4>
                        <p>Además acceso a los workshops que se estarán presentando.</p>
                    </div>

                </div>
                <!--end features_item -->
                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_right">
                        <span class="fa fa-bar-chart features_icons"></span>
                    </div>

                    <div class="text_align_right">
                        <h4>Puntaje Obtenido</h4>
                        <p>Puedes conocer el rendimiento que ha obtenido durante la competencia.</p>
                    </div>

                </div>
                <!--end features_item -->


            </div>
            <!--end col-md-4 -->

            <!--begin col-md-4 -->
            <div class="col-md-4 wow slideInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">

                <img src="images/features-iphone.png" alt="App Senasoft 2019" class="width-100">

            </div>
            <!--end col-md-4 -->

            <!--begin col-md-4 -->
            <div class="col-md-4 padding-top-40">

                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_left">
                        <span class="fa fa-handshake-o features_icons"></span>
                    </div>

                    <div class="text_align_left">
                        <h4>Conocer a tu pareja</h4>
                        <p>Acceder a la información de tu compañero de competencia para estar siempre comunicados.</p>
                    </div>

                </div>
                <!--end features_item -->

                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_left">
                        <span class="fa fa-calendar-check-o features_icons"></span>
                    </div>

                    <div class="text_align_left">
                        <h4>Confirmar asistencia</h4>
                        <p>Confirmar asistencia a los workshop y asi controlar la asistencia de los instructores.</p>
                    </div>

                </div>
                <!--end features_item -->
                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_left">
                        <span class="fa fa-info-circle features_icons"></span>
                    </div>

                    <div class="text_align_left">
                        <h4>Información a la mano</h4>
                        <p>Esta y otras características permitirán que estés enterado de toda la competencia.</p>
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
                                    <i class="icon icon-rocket panel-icon"></i> ¿Qué herramientas se van a utilizar en
                                    cada una de las categorías?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                            <div class="panel-body">
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia
                                    magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis
                                    reprehenderit ets quis velit.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingTwo">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="icon icon-prize-award panel-icon"></i> ¿Cuántas personas se deben
                                    inscribir para cada una de las categorías?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                            <div class="panel-body">
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia
                                    magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis
                                    reprehenderit ets quis velit.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingThree">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="icon icon-present-gift panel-icon"></i> ¿Dónde podemos encontrar el
                                    cronograma del evento?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                            <div class="panel-body">
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia
                                    magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis
                                    reprehenderit ets quis velit.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingFour">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="icon icon-present-gift panel-icon"></i> ¿Cuál es la manera más fácil de
                                    llegar al centro de formación?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">

                            <div class="panel-body">
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur netsum loris fugit, sed quia
                                    magni dolores eos qui ratione sequi nesciunt, neque et quis autem velis
                                    reprehenderit ets quis velit.</p>
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
@endsection