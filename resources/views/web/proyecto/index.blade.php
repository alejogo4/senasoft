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
        <form action="{{ route('proyecto.store') }}" method="post" enctype="multipart/form-data" id="form" class="signup-form">
            {{ csrf_field() }}
            <div>
                <h3>Empecemos</h3>
                <fieldset class="row">
                    <h2 class="col-md-12">Concurso de proyectos de centro</h2>
                    <div class="col-md-12">
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="choose-bank col-md-12">
                        <p class="choose-bank-desc">
                            Los proyectos que se postulen para SenaSoft, deberán tener componentes innovadores y elementos como big data, inteligencia artificial, desarrollo web o internet de las cosas, entre otros y deben pertenecer a la red.
                            <br>En este espacio encuentran:
                            <ul class="list-group">
                                <li class="list-group-item">Los lineamientos del concurso para el Proyecto que seleccione cada Centro de Formación que ha sido invitado a SenaSoft Medellín 2019.</li>
                                <li class="list-group-item">El plan de trabajo para esta modalidad, con cada una de las actividades y fechas máximas.</li>
                                <li class="list-group-item">La ficha de proyecto que cada centro deberá diligenciar con el proyecto que postulan (Se deben diligenciar cada uno de los campos).</li>
                                <li class="list-group-item">Adicional, encontrarán los criterios de selección de los proyectos que participarán en el concurso.</li>
                            </ul>
                        </p>
                        <div class="form-radio-flex">
                            <a href="{{asset('files/Evaluación Proyectos SenaSoft 2019_May 30.xlsx')}}" class="section-lyla btn btn-formato">Descargar el formato <span class="fa fa-download"></span></a>
                        </div>
                    </div>
                </fieldset>
                <h3>Responsable</h3>
                <fieldset class="row">
                    <h2 class="col-md-12">Información del responsable</h2>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="">Nombres</label>
                                    <input type="text" name="nombre" id="nombre" required />
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellido" id="apellido" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Correo Principal</label>
                                    <input type="email" name="correo" id="correo" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" required />
                                </div>
                            </div>


                        </div>
                    </div>
                </fieldset>

                <h3>Cargar el formato</h3>
                <fieldset>
                    <h2>Cargar el formato correctamente diligenciado</h2>
                    <p class="desc"></p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">

                                    <div class="col-md-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h5>Adjuntar el archivo</h5>
                                                <p>Adjuntar archivo de excel</p> 
                                            </div>
                                            <div class="panel-body dropzone" id="proyecto">

                                            </div>
                                        </div>
                                    </div>
                                    <!--<input value="Enviar proyecto" class="btn btn-primary nextBtn btn-sm pull-right" type="submit" id="submit-button">-->
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