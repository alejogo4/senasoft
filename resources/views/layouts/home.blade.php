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
        <video id="bg_video" title="Centro de servicios y gestión empresarial" autoplay="true" loop muted="muted">
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
                <p class="parrafo">El Centro de Servicios y Gestión Empresarial de la Regional Antioquia está
                    organizando la décima versión de Senasoft a realizarse del 22 al 25 de Octubre de 2019. </p>

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

                <h2 class="section-title">Cronograma del Evento</h2>

                <p class="section-subtitle">El cronograma del evento estará sujeto a modificaciones.</p>

            </div>
            <ul class="nav nav-tabs">
                <li class="col-md-3 col-sm-12 col-xs-12"><a data-toggle="tab" href="#menu1">Martes</a></li>
                <li class="col-md-3 col-sm-12 col-xs-12"><a data-toggle="tab" href="#menu2">Miércoles</a></li>
                <li class="col-md-3 col-sm-12 col-xs-12"><a data-toggle="tab" href="#menu3">Jueves</a></li>
                <li class="col-md-3 col-sm-12 col-xs-12"><a data-toggle="tab" href="#menu4">Viernes</a></li>
            </ul>

            <div class="tab-content">

                <div id="menu1" class="tab-pane fade in active">
                    <h3>Martes</h3>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>06:00 AM - 02:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Llegada a Medellín.</h4>
                            <p>Traslado a los hoteles desde el aeropuerto o terminal.</p>
                            <p>10:00 a.m primer transporte.</p>
                            <p>12:00 m segundo transporte.</p>
                            <p>2:00 p.m tercer transporte.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>12:00 M - 02:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el hotel.</h4>
                            <p>Se realiza el registro de todos los integrantes.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>02:00 PM - 03:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado desde el hotel a lugar del evento.</h4>
                            <p>Quienes lleguen despues de las 2.00 p.m. al aeropuerto, llegan al lugar del evento.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>03:00 PM - 06:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el evento y entrega de equipos.</h4>
                            <p>Todos los participantes hacen entrega de los equipos registrados previamente para la
                                participación de las diferentes categorías.</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>06:00 PM - 07:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Inauguración al evento</h4>
                            <p>Se realiza la inauguración de SenaSoft 2019 - Medellín</p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>07:00 PM - 08:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado y cena.</h4>
                            <p>Se regresa al lugar de hospedaje para tomar la cena.</p>
                        </div>
                    </div>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>08:00 PM - 10:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Registro en el evento y entrega de equipos segunda parte.</h4>
                            <p>Para los instructores y aprendices que lleguen despues de las 6:00pm podran hacer entrega
                                de los equipos en esta franja.</p>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Miércoles</h3>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>06:00 AM - 07:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado desde el hotel al lugar del evento.</h4>

                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>07:00 AM - 09:00 AM</time></div>
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
                        <div class="col-md-2"><time>09:00 AM - 01:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Competencia Aprendices.</h4>
                            <p>Primera fase de la competencia; <b>Todos los instructores deben asistir a una conferencia
                                    en
                                    auditorio.</b></p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>01:00 PM - 02:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Almuerzo</h4>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>02:00 PM - 06:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Competencia Aprendices.</h4>
                            <p>Segunda Fase</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>02:00 PM - 04:00 PM</time></div>
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
                        <div class="col-md-2"><time>04:00 PM - 06:00 PM</time></div>
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
                    <h3>Jueves</h3>
                    <div class="row schedule-item justify-content-center">
                        <div class="col-md-2"><time>07:00 AM - 08:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado desde el hotel al lugar del evento.</h4>
                            <p></p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>08:00 AM - 12:00 M</time></div>
                        <div class="col-md-10">
                            <h4>Competencia Aprendices.</h4>
                            <p>Tercera Fase</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>08:00 AM - 12:00 M</time></div>
                        <div class="col-md-10">
                            <h4>Certificaciones: Autodesk, Adobe, Microsoft.</h4>
                            <p>(ambiente #1, ambiente #2 y ambiente #3)</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>12:00 M - 01:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Almuerzo</h4>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>01:00 PM - 04:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Pitch</h4>
                            <p>Cuarta Fase de la competencia</p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>04:00 PM - 06:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Entrega de equipos</h4>
                            <p></p>
                        </div>
                    </div>

                    <div class="row schedule-item">
                        <div class="col-md-2"><time>06:00 PM - 08:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Traslado a hoteles y cena.</h4>
                            <p></p>
                        </div>
                    </div>

                    <!--<div class="row schedule-item">
                        <div class="col-md-2"><time>08:00 PM - 11:00 PM</time></div>
                        <div class="col-md-10">
                            <h4>Tour Medellín</h4>
                            <p>Solo para quienes confirmen en el registro</p>
                        </div>
                    </div>-->
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3>Viernes</h3>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>08:00 AM - 10:00 AM</time></div>
                        <div class="col-md-10">
                            <h4>Transporte de hotel a lugar del evento</h4>
                            <p>salen con todo: equipaje y equipos</p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>10:00 AM - 12:00 M</time></div>
                        <div class="col-md-10">
                            <h4>Clausura</h4>
                            <p></p>
                        </div>
                    </div>
                    <div class="row schedule-item">
                        <div class="col-md-2"><time>12:00 M</time></div>
                        <div class="col-md-10">
                            <h4>Regreso a ciudades de origen.</h4>
                            <p></p>
                        </div>
                    </div>
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

                <h2 class="section-title white">Categorías</h2>

                <p class="section-subtitle white">Listado de categorías para Senasoft 2019.</p>

            </div>
            <!--end col md 12 -->

            <!--begin col md 12 -->
            <div class="gallery-item-wrapper padding-top-30">

                <!--begin owl carousel -->
                <div id="owl2" class="owl-carousel owl-theme">

                    <div>
                        <img src="/images/categorias/algoritmos_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Algoritmos</h3>
                            <p>Plantear soluciones algorítmicas a diferentes situaciones planteadas y que aporten valor
                                a la empresa. </p>
                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Algoritmos.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>

                    <div>
                        <img src="/images/categorias/animacion3d.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Animación 3D</h3>
                            <p>Diseñar, modelar y animar un personaje con su escenario. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Animación 3D.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>

                    <div>
                        <img src="/images/categorias/audiovisuales.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Producción de Medios Audiovisuales Digitales</h3>
                            <p>Realizar una solución audiovisual, teniendo en cuenta las fases de producción y los
                                requerimientos del cliente. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Producción Medios Audiovisuales.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>

                    <div>
                        <img src="/images/categorias/basesdedatos.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Bases de Datos</h3>
                            <p>Construir sentencias SQL a partir de un diseño de base de datos. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Bases de Datos.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>

                    <div>
                        <img src="/images/categorias/ideatic_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Ideatic</h3>
                            <p>Con el objetivo de promover el trabajo en equipo y fomentar las capacidades de
                                cooperación, creatividad e innovación, requeridas por los entornos laborales de hoy,
                                Senasoft 2019, incluye una nueva modalidad de participación denominada Ideatic. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica IDEATIC.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>

                    <div>
                        <img src="/images/categorias/moviles_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Desarrollo de <br> Aplicaciones Móviles</h3>
                            <p>Desarrollo de software para dispositivos móviles (APP) a través de tecnologías nativas o
                                híbridas teniendo en cuenta la experiencia de usuario (UX/UI). </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Desarrollo Móvil.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>
                    <div>
                        <img src="/images/categorias/multimedia_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Producción de <br>Multimedia</h3>
                            <p>Desarrollar productos innovadores en términos de diseño gráfico, desarrollo de
                                aplicaciones web y experiencias audiovisuales. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Multimedia.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>
                    <div>
                        <img src="/images/categorias/redes_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Redes<br> y Mantenimiento</h3>
                            <p>Video, voz, datos y Tv, Redes Convergentes, todo en una infraestructura de Hardware y
                                Software que ofrece servicios, aplicaciones y utilidades con el propósito de brindar
                                seguridad, integridad y disponibilidad. </p>
                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Gestion de Redes y Mantenimiento.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>
                    <div>
                        <img src="/images/categorias/videojuegos_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Videojuegos</h3>
                            <p>Desarrollar la lógica y mecánicas de un videojuego. </p>
                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría de Videojuegos.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
                    </div>
                    <div>
                        <img src="/images/categorias/web_color.png" alt="showcase" class="gallery-show">
                        <div class="content-category">
                            <h3>Desarrollo Web</h3>
                            <p>Desarrollar aplicaciones web funcionales, de acuerdo con necesidades del sector
                                productivo. </p>

                        </div>
                        <a href="{{asset('files/fichas_tecnicas/Ficha Técnica Categoría Desarrollo Web.pdf')}}" target="_blank" class="section-lyla btn btn-formato">
                            Ficha técnica
                            <span class="fa fa-eye"></span>
                        </a>
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

                    <p class="section-subtitle">En el año 2008 inició Senasoft en la ciudad de Medellín, hoy tenemos un
                        histórico <br>del evento que se ha realizado durante 10 años.</p>

                </div>
                <!--end col-md-12 -->

                <div class="row">
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
                                doscientos (200) aprendices de Software de 18 regionales del SENA quienes participaron
                                en las categorías de Algoritmia, Análisis y diseño, Bases de Datos, PHP, Java, Punto
                                Net.</p>

                            <ul class="team-icon">
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

                            <p>Entre el 1 y 3 de julio de 2009, la segunda versión de Senasoft tuvo como sede a la
                                ciudad de Popayán. Se congregaron cerca de 60 instructores y 400 aprendices de 30
                                regionales a nivel país, lo cual hizo notar el interés que ha despertado este evento de
                                desarrollo de software en el SENA. Los aprendices participaron en las categorías de
                                algoritmos, Bases de Datos en SQL, PHP, .Net y Java.
                            </p>

                            <ul class="team-icon">
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

                            <p>El 12 y 13 de Octubre de 2010, se llevó a cabo la tercera versión de Senasoft. Para dicha
                                versión, se contó con la participación de 520 aprendices, quienes compitieron en las
                                categorías de Algoritmia, Análisis y Diseño Orientado a Objetos, Bases de Datos, PHP,
                                Java, .Net, Desarrollo de Aplicaciones Móviles, Multimedia y Animación 3D.</p>

                            <ul class="team-icon">
                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->
                </div>


                <div class="row">
                    <!--begin team-item -->
                    <div class="col-sm-12 col-md-4">

                        <div class="team-item">

                            <img src="/logosenasoft/2013.jpg" class="team-img" alt="pic">

                            <h3>2013</h3>

                            <div class="team-info">
                                <p>CAUCA</p>
                            </div>

                            <p>Para la cuarta versión de Senasoft Cauca la cual se llevó a cabo del 21 al 24 de Octubre,
                                asistieron 650 aprendices de 31 regionales, participantes en las categorías de: Análisis
                                y Diseño Orientado a Objetos, Bases de Datos, Desarrollo de Aplicaciones en Java Web,
                                Desarrollo de Aplicaciones en C# .Net, Desarrollo de Aplicaciones con PHP, Desarrollo de
                                Aplicaciones Móviles con Android, Proyecto Multimedial, Animación 3D, Desarrollo de
                                Videojuegos, Redes de Datos y Producción de Medios Audiovisuales.</p>

                            <ul class="team-icon">
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

                            <p>Durante los días 14 al 17 de octubre del 2014 se desarrolló Senasoft en la capital del
                                Huila, el cual contó con la participación de expertos en tecnología e información; de
                                esta manera 772 aprendices de todo el país pertenecientes a 32 regionales, se
                                concentraron en Neiva para el intercambio de conocimientos, concursando en 14 categorías
                                como Diseño Orientado a Objetos, Animación 3D, Aplicaciones Móviles, Producción de
                                Multimedia y Videojuegos, entre otras.
                            </p>

                            <ul class="team-icon">
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

                            <p>Del 23 al 26 de noviembre se dieron cita 1500 personas, entre aprendices, instructores,
                                expertos, empresarios y público en general, para participar de Senasoft. Los aprendices
                                participaron en las siguientes categorías: Algoritmia, Diseño Orientado a Objetos, Bases
                                de Datos, Java Web, Aplicaciones .Net, Aplicaciones Web PHP, Aplicaciones Móviles con
                                Android, Producción de Multimedia, Videojuegos, Animación 3D, Producción de Medios
                                Audiovisuales, Redes de Datos, Instalación y Hardening de Sistemas Operativos, Sistemas
                                Operativos de Red y Proyectos Ágiles con SCRUM.</p>

                            <ul class="team-icon">
                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->

                </div>


                <div class="row">


                    <!--begin team-item -->
                    <div class="col-sm-12 col-md-4">

                        <div class="team-item">

                            <img src="/logosenasoft/2016.jpg" class="team-img" alt="pic">

                            <h3>2016</h3>

                            <div class="team-info">
                                <p>QUINDIO</p>
                            </div>

                            <p>En la ciudad de Armenia del 24 al 28 de Octubre, se reunieron 400 aprendices de todo el
                                país para participar en las categorías de Algoritmia, Animación 3D, Aplicaciones Móviles
                                Android, Aplicaciones Web PHP, Aplicaciones .Net, Bases de Datos, Diseño Orientado a
                                Objetos, Instalación y Hardening de Sistemas Operativos, Java Web, Producción de Medios
                                Audiovisuales, Producción de Multimedia, Proyectos Ágiles con Scrum, Redes de Datos,
                                Sistemas Operativos de Red y Videojuegos.</p>

                            <ul class="team-icon">
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

                            <p>Del 24 y el 28 de julio se llevó a cabo en la ciudad de Cartago, la octava versión de
                                Senasoft. En dicha oportunidad, los aprendices participaron en las categorías de:
                                Algoritmia, Animación 3D, Aplicaciones. Net, Aplicaciones Móviles Android, Aplicaciones
                                WEB con PHP y SCRUM, Base de Datos, Instalación y Hardening de Sistemas Operativos,
                                Producción de Medios Audiovisuales, Producción de Multimedia, Redes de Datos,
                                Videojuegos, Video Maping y Emprendimiento Digital.
                            </p>

                            <ul class="team-icon">
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

                            <p>Durante los días 19 y 20 de septiembre, se realizó en la ciudad de Barranquilla la novena
                                versión de Senasoft. 406 jóvenes de 28 departamentos de Colombia midieron su talento y
                                conocimiento en las categorías de animación 3D, videojuegos, producción de medios
                                audiovisuales, producción de multimedia, redes de datos, desarrollo de aplicaciones
                                móviles y web, emprendimiento digital, algoritmia y hardening de sistemas operativos de
                                red.</p>

                            <ul class="team-icon">
                            </ul>

                        </div>

                    </div>
                    <!--end team-item -->
                </div>

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
                    <li><img src="/logosempresas/Dreamhouse.png" style="width: 70%;" alt="Dream House"></li>
                    <li><img src="/logosempresas/intergrupo.png" alt="Intergrupo"></li>
                    <li><img src="/logosempresas/panduit.png" alt="Panduit"></li>
                    <li><img src="/logosempresas/sigma.png" alt="Sigma"></li>

                </ul>
                <!--end partners-mentions -->

            </div>

        </div>

    </div>

</section>
<!--end partners section -->



<!--begin newsletter section -->
<section class="section-lyla-shape" id="reglamento">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 text-center padding-top-60 padding-bottom-20">

                <h3 class="white-text">Descargar reglamento y otros documentos de apoyo, para la competencia Senasoft
                    2019.</h3>

            </div>
            <div class="row">
                <div class="col-md-4 col-xs-6 col-md-offset-2">
                    <a href="{{asset('files/Reglamento SENASOFT 2019 Medellin.pdf')}}" download class="btn btn-reglamento">Descargar
                        Reglamento
                        <span class="fa fa-download"></span>
                    </a>

                    </a>
                </div>
                <div class="col-md-4 col-xs-6">
                    <a target="_blank" href="https://drive.google.com/open?id=1F6chpn19GcT1QaNeyDJ2hXtqHQLHrV2C" download class="btn btn-reglamento">Histórico de pruebas
                        <span class="fa fa-files-o"></span>
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
                    Para la estrategia de Senasoft 2019, se ha desarrollado una aplicación móvil para facilitar el
                    acceso a la información. <br>Esta posee unas grandes características como: </p>

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
                        <p>Información de los horarios de alimentación durante los días de competencia.</p>
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
                        <p>Información y control de asistencia a los workshops que se desarrollarán para instructores.
                        </p>
                    </div>

                </div>
                <!--end features_item -->
                <!--begin features_item -->
                <div class="features_item">

                    <div class="dropcaps_right">
                        <span class="fa fa-bar-chart features_icons"></span>
                    </div>

                    <div class="text_align_right">
                        <h4>Proyectos seleccionados</h4>
                        <p>Listado de los proyectos que se presentarán en la muestra.</p>
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
                        <h4>Conoce a tu equipo</h4>
                        <p>Accede a la información de tu compañero(s) de competencia para estar siempre comunicado.</p>
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
                        <p>El instructor que acompañará a los aprendices, confirmara la asistencia de los participantes
                            una vez lleguen a la terminar aerea o terrestre.</p>
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
                        <p>Información relacionada con hotel y rutas de transporte.</p>
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

                <h4>Ubicación del Evento</h4>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1508261082986!2d-75.57808868573414!3d6.243845228084605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4429ab627545c1%3A0x23674fd4c47ec19c!2sCentro%20de%20Convenciones%20Plaza%20Mayor!5e0!3m2!1ses!2sco!4v1570533757747!5m2!1ses!2sco" width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                    <i class="icon icon-rocket panel-icon"></i>
                                    ¿Todos los computadores del equipo participante deben tener el mismo software y
                                    especificaciones técnicas?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                            <div class="panel-body">
                                <p>Si, estás especificaciones se encuentran establecidas en la ficha técnica de la
                                    categoría.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingTwo">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="icon icon-prize-award panel-icon"></i>
                                    ¿En la categoría puede participar un aprendiz en etapa productiva?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                            <div class="panel-body">
                                <p>NO, solo participan aprendices en etapa lectiva.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingThree">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="icon icon-present-gift panel-icon"></i>
                                      ¿Previo al evento, se podrá conocer la conformación de los equipos participantes?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                            <div class="panel-body">
                                <p>SI, una vez conformados, posterior al cierre de las inscripciones. Se darán a conocer
                                    los datos de los participantes y la conformación de los equipos.</p>
                            </div>

                        </div>

                    </div>
                    <!--end panel-default -->

                    <!--begin panel-default -->
                    <div class="panel panel-default">

                        <div class="panel-heading" role="tab" id="headingFour">

                            <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="icon icon-present-gift panel-icon"></i>
                                    ¿Un aprendiz de media técnica puede participar?
                                </a>

                            </h4>

                        </div>

                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">

                            <div class="panel-body">
                                <p>NO. Solo participan aprendices de los programas de tecnólogo.</p>
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
                <p>Desarrollado por : Juan David Ramirez - Alejandro Giraldo Duque
                    - Hector Dario Maya | Instructores SENA - CESGE</p>

                <!--begin footer_social -->
                <ul class="footer_social">

                    <li>
                        <a href="https://twitter.com/SENAComunica" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.facebook.com/SENAColombiaOficial/" target="_blank">
                            <i class="fa fa-facebook"></i>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Itinerario Vuelos SENASOFT</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Los tiquetes aéreos de las regionales que se trasladaran a la ciudad de Medellín están dispuestos en la carpeta compartida que puede ingresar haciendo clic <a target="_blank" href="https://drive.google.com/drive/folders/1Ur63fybjEUnh8bLvGrOae5ENvQrTZFmi">aquí</a>, se encuentran organizados desde la ciudad de origen del aeropuerto, en el archivo TIQUETES SENASOFT 2019.pdf podrán encontrar la solicitud del tiquetes, regional y ciudad de origen de cada pasajero; las regionales con solicitud de tiquetes aéreo son las siguientes:</h5>
                        ATLÁNTICO <br>
                        BOLÍVAR <br>
                        BOYACÁ <br>
                        CALDAS <br>
                        CAQUETÁ <br>
                        CAUCA,<br>
                        CESAR <br>
                        CHOCÓ <br>
                        CÓRDOBA <br>
                        CUNDINAMARCA <br>
                        DISTRITO CAPITAL <br>
                        GUAINÍA <br>
                        GUAJIRA <br>
                        HUILA <br>
                        MAGDALENA <br>
                        META <br>
                        NARIÑO <br>
                        NORTE DE SANTANDER <br>
                        PUTUMAYO <br>
                        QUINDÍO <br>
                        RISARALDA <br>
                        SANTANDER <br>
                        SAN ANDRÉS <br>
                        SUCRE <br>
                        TOLIMA <br>
                        VALLE <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section("script")
<script>
    $(function() {
        $("#myModal").modal();
        // consultarGrupos();
    })

    function toogle(e) {
        $(`#${e}`).fadeToggle("fast", "linear");

        if ($(`#icon${e}`).hasClass("fa fa-plus")) {
            $(`#icon${e}`).removeAttr("class");
            $(`#icon${e}`).attr("class", "fa fa-minus")
        } else {
            $(`#icon${e}`).removeAttr("class");
            $(`#icon${e}`).attr("class", "fa fa-plus")
        }
    }

    function consultarGrupos() {
        $.ajax({
            url: '/api/listar/grupos',
            dataType: 'json'
        }).done(respuesta => {

            $("#btnGenerar").hide();
            let key = Object.keys(respuesta);

            key.map((ee, i) => {
                let contenido =
                    `<ul class="timeline"><h3 style="cursor:pointer; color:#0e8481" onclick="toogle('${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}')">${ee} <i id="icon${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}" class="fa fa-plus" aria-hidden="true"></i></h3><div style="display:none" id="${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}">`;
                let anterior = "";
                let cont = 0;
                respuesta[ee][0].map(e => {

                    if (e.nombre != anterior) {
                        contenido += `<li><a href="#" >${e.nombre}</a><div class="row">`;
                        cont = 0;
                    }

                    contenido += `
                                <div class="col-md-${respuesta[ee][1] == 1 ? "12" : (respuesta[ee][1] == 2)? "6" : "4"}">
                                <span>${e.nombres} ${e.apellidos}</span><br>
                                <p>${e.correo_principal}</p>
                                <b>${e.nombre_regional}</b><br>
                                <span>${e.nombre_centro}</span>
                                </div>
                                `;

                    cont++;
                    anterior = e.nombre;
                    if (cont == respuesta[ee][1]) {
                        contenido += "</div></li><hr>";
                    }
                })
                contenido += `</div></ul>`;

                $("#contenido").append(contenido);
            });
        })
    }
</script>
@endsection