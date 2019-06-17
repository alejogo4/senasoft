@extends('layouts.master')
@section("style")
<!-- Font Icon -->
<link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">

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
        <form action="{{ route('proyecto.store') }}"  method="post" enctype="multipart/form-data" id="signup-form" class="signup-form">
        {{ csrf_field() }}       
            <div>
                <h3>Empecemosss</h3>
                <fieldset class="row">
                    <h2 class="col-md-12">Concurso de proyectos de centro</h2>
                    <div class="col-md-12">
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="choose-bank col-md-12">
                        <p class="choose-bank-desc">Explicacion</p>
                        <div class="form-radio-flex">
                            <a href="{{asset('files/Evaluación Proyectos SenaSoft 2019_May 30.xlsx')}}" class="section-lyla btn btn-formato">Descargar el formato <span class="fa fa-download"></span></a>
                        </div>
                    </div>
                </fieldset>

                <h3>Cargar el formato</h3>
                <fieldset>
                    <h2>Cargar el formato</h2>
                    <p class="desc">Cargar el formato diligenciado.</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <input class="contact-input white-input" required="" name="proyecto_file" placeholder="Regional" type="file">
                                    <input value="Enviar proyecto" class="btn btn-primary nextBtn btn-sm pull-right" type="submit" id="submit-button">
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
<script src="/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="/vendor/minimalist-picker/dobpicker.js"></script>
<script src="/vendor/nouislider/nouislider.min.js"></script>
<script src="/vendor/wnumb/wNumb.js"></script>
<script src="/js/main.js"></script>
@endsection
