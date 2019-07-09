@extends('layouts.master')
@section("style")
<!-- Font Icon -->
<link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">

<!-- Main css -->
<link rel="stylesheet" href="/css/wizard.css">

<style>
    .section-white {
        padding: 0;
    }

    .section-white.no-padding-bottom,
    .section-grey.no-padding-bottom {
        padding: 0;
    }

    .select2 {
        width: 100% !important;
    }

    .select2-selection {
        height: 50px !important;
    }

</style>
@endsection

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
<!--begin contact -->
<section class="section-white no-padding-bottom" id="contact">

    <div class="main">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--begin success message -->
        @if (session('mensaje'))
        <p class="contact_success_box animated fadeIn">{{ session('mensaje') }}</p>
        @endif
        <form action="{{ route('proyecto.store') }}" method="post" enctype="multipart/form-data" id="form"
            class="signup-form">
            {{ csrf_field() }}
            <div>
                <h3>Empecemos!</h3>
                <fieldset class="row">
                    <h2 class="col-md-12 text-uppercase">Bienvenido(a) instructor del <span class="color-tittle">{{session("centro")}} </span>de la Regional
                        <span class="color-tittle">{{session("regional")}}</span>
                    </h2>
                    <h2 class="col-md-12">Muestras de Proyectos de Innovación </h2>
                    <div class="choose-bank col-md-12">
                        <p class="choose-bank-desc">
                            En la décima versión de SENASOFT se contará con un espacio para que doce (12) centros de
                            formación, expongan proyectos innovadores.
                            <br>
                            <br>
                            Los Centros de Formación que deseen participar en el proceso de selección de proyectos,
                            deben descargar el formato ficha de proyecto. La ficha debe ser diligenciada y el instructor
                            líder de SENASOFT en el Centro de Formación, subirá el formato.
                            <br>
                            <br>
                            Los proyectos que se postulen para SENASOFT, deberán tener componentes innovadores y
                            elementos como Big Data, Inteligencia Artificial, Desarrollo Web o Internet de las Cosas,
                            entre otros y deben pertenecer a los programas de formación de nivel tecnólogo de la Red de
                            Informática, Diseño y Desarrollo de Software.
                            <br>
                            <br>

                            <b>Las fechas establecidas para el proceso de selección y evaluación de proyectos son las
                                siguientes:</b>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <b>Diligenciamiento y envío Formato Ficha Proyecto por cada centro </b> -
                                            del 2 de Julio al
                                            13 de Julio
                                        </div>
                                        <div class="col-md-5">
                                            <a href="{{asset('files/Evaluación Proyectos SenaSoft 2019_May 30.xlsx')}}"
                                                class="section-lyla btn btn-formato">Descargar Formato
                                                <span class="fa fa-download"></span></a>
                                        </div>
                                    </div>


                                </li>
                                <li class="list-group-item">
                                    <b>Evaluación Fichas de Proyecto </b> - del 15 Julio al 31 de Julio
                                </li>
                                <li class="list-group-item">
                                    <b>Publicación de los 12 proyectos seleccionados </b> - 2 de Agosto
                                </li>
                            </ul>
                        </p>
                        <p>
                            <h5>Reglamento</h5>
                            <ol style="list-style: outside">
                                <li>Para la presentación del proyecto, sólo se permite la participación de un (1)
                                    aprendiz por Centro.</li>
                                <li>Cada proyecto contará con un stand o espacio, para que el aprendiz exponga el
                                    proyecto. En el stand, el aprendiz ubicará su equipo de cómputo y un pendón de 80 cm
                                    * 1 mt, con información alusiva al proyecto (los equipos y pendón, los debe proveer
                                    el Centro de Formación participante).</li>
                                <li>Para la evaluación de los proyectos, se contará con un jurado conformado por
                                    empresarios, subdirectores e instructores.</li>
                            </ol>
                        </p>
                    </div>
                </fieldset>
                <h3>Instructor Responsable</h3>
                <fieldset>
                    <h2>Información del Instructor Responsable</h2>
                    <p class="desc">Ingrese la información requerida <b class="text-danger">*</b> y continúe con el
                        siguiente paso para poder finalizar el registro</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombres <b class="text-danger"></b></label>
                                    <input type="text" disabled value="{{$persona_centro->nombres}}" name="nombre" id="nombre" required />
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="">Apellidos <b class="text-danger"></b></label>
                                    <input type="text" disabled value="{{$persona_centro->apellidos}}" name="apellido" id="apellido" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Correo Principal <b
                                            class="text-danger"></b></label>
                                    <input disabled value="{{$persona_centro->correo_principal}}" type="email" name="correo" id="correo" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefono" class="form-label">Teléfono <b
                                            class="text-danger"></b></label>
                                    <input disabled value="{{$persona_centro->telefono}}" type="text" name="telefono" id="telefono" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Cargar el Formato</h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h5>Adjuntar el archivo excel correctamente diligenciado</h5>
                                        </div>
                                        <div class="panel-body dropzone" id="proyecto">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</section>

@endsection


@section('script')
<script src="/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="{{asset('js/validate-es.min.js')}}"></script>
<script src="/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="/vendor/minimalist-picker/dobpicker.js"></script>
<script src="/vendor/nouislider/nouislider.min.js"></script>
<script src="/vendor/wnumb/wNumb.js"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/select2-es.js')}}"></script>
<script src="{{asset('js/dropzone.js')}}"></script>
<script src="/js/registro_proyectos.js"></script>

@endsection


