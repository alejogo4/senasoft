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
<!--begin contact -->
<section class="section-white no-padding-bottom" id="contact">

    <!--begin container-->
    <div class="container">

        <!--begin row-->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12">
                <h4>Concurso de proyectos de centro</h4>
                <!--begin success message -->
                @if (session('mensaje'))
                    <p class="contact_success_box animated fadeIn">{{ session('mensaje') }}</p>
                @endif
                <!--end success message -->
                <!--Slider Form-->
                <div class="container">
                    <div class="stepwizard col-md-offset-1">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary  btn-circle" >1</a>
                                <p>1: Descarga y diligencia el formato</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>2: Ingresa el código de centro</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>3: Cargar el formato</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('proyecto.store') }}"  method="post" enctype="multipart/form-data" id="contact-form"  class="contact" >
                    {{ csrf_field() }}       
                    <div class="row setup-content" id="step-1">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <a href="{{asset('files/Evaluación Proyectos SenaSoft 2019_May 30.xlsx')}}" class="section-lyla btn btn-formato">Descargar el formato <span class="fa fa-download"></span></a>
                                    <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <input class="contact-input white-input" required="" name="codigo" placeholder="Ingresar Código*" type="text">
                                    <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-6 col-md-offset-3">

                                <input class="contact-input white-input" required="" name="proyecto_file" placeholder="Regional" type="file">

                                <input value="Enviar proyecto" class="btn btn-primary nextBtn btn-sm pull-right" type="submit" id="submit-button">
                            </div>
                        </div>
                        
                    </form>

            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--end Slider Form-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</section>
<!--end contact-->


@endsection