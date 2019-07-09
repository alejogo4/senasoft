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


<!-- Modal -->
<div class="modal fade" id="modal_recomen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <img src="/images/instructivo_equipos.JPG" alt="Recomendaciones Instructivo" width="100%">
            </div>
        </div>
    </div>
</div>

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
 
        <form action="" method="post" enctype="multipart/form-data" id="form" class="signup-form">
            <div>
                <h3>Empecemos!</h3>
                <fieldset class="row">
                    <h2 class="col-md-12 text-uppercase">Bienvenido(a) instructor del <span class="color-tittle">{{session("centro")}} </span>de la Regional
                        <span class="color-tittle">{{session("regional")}}</span>
                    </h2>
                    <h2 class="col-md-12"> Registro de Equipos </h2>
                    <div class="choose-bank col-md-12">
                        <p class="choose-bank-desc">
                        Para la participación de los aprendices en SENASOFT 2019, cada aprendiz deberá traer su equipo de cómputo, 
                        el cual debe estar registrado en miinventario.sena.edu.co 
                            <br>
                            <br>
                            El instructor que realice la inscripción de los aprendices en la página de Senasoft, descargará el formato Registro Equipos y deberá diligenciar toda la información que se solicita, la cual debe ser correspondiente con la información que se encuentra en miinventario.sena.edu.co. 
                            <br>
                            <br>
                            Una vez se tenga el formato diligenciado, el instructor subirá el archivo por la opción Cargar Formato.
                            <br>
                            
                            <br>

                            <b>Las fechas establecidas para el proceso de registro de equipos será:</b>
                            <ul class="list-group">
                            <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Para el cargue del registro de equipos el instructor se debera seguir las siguientes indicaciones
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="section-lyla btn btn-formato btn-lg" data-toggle="modal" data-target="#modal_recomen">
                                                Ver
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b>Descarga, diligenciamiento y envío formato registro de equipos por cada centro </b> -
                                            del 15 de Julio al
                                            8 de Agosto.
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{asset('files/Registro Equipos.xlsx')}}"
                                                class="section-lyla btn btn-formato">Descargar
                                                <span class="fa fa-download"></span></a>
                                        </div>
                                    </div>
                            </ul>
                        </p>
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
                                        <div class="panel-body dropzone" id="equipo">

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
<script src="/js/registro_equipo.js"></script>
@endsection

