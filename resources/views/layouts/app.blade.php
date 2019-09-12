<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SenaSoft Admin</title>
    <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/img/favicon-16x16.png')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('admin/vendors/css/base/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/base/elisyam-1.5.css')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield("style")
</head>

<body id="page-top">
    <!-- Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" id="modal_equipo" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tabla_equipo" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Placa</th>
                                            <th>Serial</th>
                                            <th>Modelo</th>
                                            <th>Descripción</th>
                                            <th>Descripción Actual</th>
                                            <th>Atributos</th>
                                            <th>Especificaciones técnicas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>

    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="{{asset('admin/img/logo-big.png')}}" alt="logo" class="loader-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- End Preloader -->
    <div class="page">
        <!-- Begin Header -->
        <header class="header">
            <nav class="navbar fixed-top">
                <!-- Begin Topbar -->
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Begin Logo -->
                    <div class="navbar-header">
                        <a href="db-default.html" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="{{asset('admin/img/logo-big.png')}}" alt="logo" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="{{asset('admin/img/brand_small.png')}}" alt="logo" class="logo-small">
                            </div>
                        </a>
                        <!-- Toggle Button -->
                        <a id="toggle-btn" href="#" class="menu-btn active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <!-- End Toggle -->
                    </div>
                    <!-- End Logo -->
                    <!-- Begin Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <!-- Begin Notifications -->
                        <li class="nav-item dropdown">
                            <a id="notificaciones" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" class="nav-link">

                            </a>
                            <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                <li>
                                    <div class="notifications-header">
                                        <div class="title">Registros (<span id="n_registros"></span>)</div>
                                        <div class="notifications-overlay"></div>
                                        <img src="{{asset('admin/img/notifications/01.jpg')}}" alt="..."
                                            class="img-fluid">
                                    </div>
                                </li>
                                <div id="lista_notificaciones">
                                    
                                </div>
                                <li>
                                    <a rel="nofollow" href="/registro_list" class="dropdown-item all-notifications text-center">Ver
                                        todas</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Notifications -->
                        <!-- User -->
                        <li class="nav-item">
                            <a href="{{ route('logout')}} }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                                class="open-sidebar logout text-center"><i class="ti-power-off"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>
                        <!-- End User -->
                    </ul>
                    <!-- End Navbar Menu -->
                </div>
                <!-- End Topbar -->
            </nav>
        </header>
        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            <div class="default-sidebar">
                <!-- Begin Side Navbar -->
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <!-- Begin Main Navigation -->
                    <ul class="list-unstyled">
                        <span class="heading">SENASOFT</span>
                        
                        <li><a href="/dash"><i class="la la-home"></i><span>Dashboard</span></a></li>
                        <li><a href="{{route('registro_list')}}"><i class="la la-users"></i><span>Registros</span></a></li>
                        <li><a href="{{route('equipo_list')}}"><i class="la la-keyboard-o"></i><span>Equipos</span></a></li>
                        <li><a href="{{route('proyecto_list')}}"><i class="la la-clipboard"></i><span>Proyectos</span></a></li>
                        
                        <span class="heading">EVALUACIÓN</span>
                        <li>
                            <a href="#dropdown-db" data-toggle="collapse">
                                <i class="la la-columns"></i><span>Configuración Fases</span>
                            </a>
                            <ul id="dropdown-db" class="collapse list-unstyled pt-0">
                            <li><a href="{{route('fase_config')}}"><i class="la la-keyboard-o"></i><span>Activación de Fases</span></a></li>
                                <li><a href="{{route('fase_carga')}}">Cargar Fases</a></li>
                                <li><a href="{{route('fase_uno')}}">Fase 1</a></li>
                                <!-- <li><a href="javascript:void(0);">Fase 3</a></li>
                                <li><a href="javascript:void(0);">Fase 4</a></li> -->
                            </ul>
                        </li>

                        <span class="heading">REGISTRAR INVITADOS</span>
                        <li>
                            <a href="#dropdown-invitados" data-toggle="collapse">
                                <i class="la la-user-plus"></i><span>Registrar</span>
                            </a>
                            <ul id="dropdown-invitados" class="collapse list-unstyled pt-0">
                                <li><a href="{{route('invitados')}}">Invitado</a></li>
                                <li><a href="javascript:void(0);">Empresa</a></li>
                              
                            </ul>
                        </li>
                    </ul>
                    <!-- End Main Navigation -->
                </nav>
                <!-- End Side Navbar -->
            </div>
            <!-- End Left Sidebar -->
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Begin Page Header-->
                    <div class="row">
                        <div class="page-header">
                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">@yield("titulo", "Blank Page")</h2>
                                <div>
                                    @yield("opciones")
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Begin Row -->
                    <div class="row flex-row">
                        <div class="col-xl-12 col-12">

                            @yield('content')
                            <!-- 
                                <div class="widget has-shadow">
                                    <div class="widget-body">
                                        <p class="text-primary mt-2 mb-2">Play with Elisyam :)</p>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Container -->
                <!-- Begin Page Footer-->
                <footer class="main-footer fixed-footer">
                    <div class="row">
                        <div
                            class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                            <p class="text-gradient-02">Desarrollado por : Juan David Ramirez - Alejandro Giraldo Duque
                                - Hector Dario Maya | Instructores SENA - CESGE</p>
                        </div>

                    </div>
                </footer>
                <!-- End Page Footer -->
                <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Page Content -->
    </div>

    <!-- Begin Vendor Js -->
    <script src="{{asset('admin/vendors/js/base/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendors/js/base/core.min.js')}}"></script>
    <script src="{{asset('admin/vendors/js/tabledit/jquery.tabledit.min.js')}}"></script>}
    <script src="{{asset('js/sweetalert2@8.js')}}"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="{{asset('admin/vendors/js/nicescroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('admin/vendors/js/app/app.min.js')}}"></script>
    
    <!-- End Page Vendor Js -->
    <script src="{{asset('admin/js/app/app.js')}}"></script>

    @yield("script")

    @yield("modal")
</body>

</html>
