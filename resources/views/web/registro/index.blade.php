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
        <form method="POST" id="signup-form" class="signup-form" action="#">
            <div>
                <h3>Empecemos</h3>
                <fieldset class="row">
                    <h2 class="col-md-12">Bienvenido centro de servicios y gestion empresaria de la regional antioquia</h2>
                    <div class="col-md-12">
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="choose-bank col-md-12">
                        <p class="choose-bank-desc">Or choose from these popular bank</p>
                        <div class="form-radio-flex">
                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona1" value="1" checked="checked" />
                                <label for="tipo_persona1"><img src="images/bank-1.jpg" alt="">
                                    Aprendiz
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona2" value="2" />
                                <label for="tipo_persona2"><img src="images/bank-1.jpg" alt="">
                                    Instructor Lider
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona3" value="3" />
                                <label for="tipo_persona3"><img src="images/bank-1.jpg" alt="">
                                    Instructor Acompañante
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona4" value="4" />
                                <label for="tipo_persona4"><img src="images/bank-1.jpg" alt="">
                                    Empresas
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona5" value="5" />
                                <label for="tipo_persona5"><img src="images/bank-1.jpg" alt="">
                                    Organizadores
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona" value="6" />
                                <label for="tipo_persona"><img src="images/bank-1.jpg" alt="">
                                    Apoyos
                                </label>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" onclick="validar_tipo_persona()" name="tipo_persona" id="tipo_persona6" value="7" />
                                <label for="tipo_persona6"><img src="images/bank-1.jpg" alt="">
                                    Reunion de Red
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-6" id="categoria">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria">
                                <option value="">Moviles</option>
                                <option value="">Web</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <h3>Información Personal</h3>
                <fieldset>
                    <h2>Información Personal</h2>
                    <p class="desc">Please enter your infomation and proceed to next step so we can build your
                        account</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">Tipo Documento</label>
                                    <select name="" id="">
                                        <option value="">TI</option>
                                        <option value="">CC</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Documento</label>
                                    <input type="text" name="nombre" id="nombre" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Nombres</label>
                                    <input type="text" name="apellido" id="apellido" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellido" id="apellido" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Correo Principal</label>
                                    <input type="email" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Correo Alterno</label>
                                    <input type="email" name="email" id="email" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="text" class="form-label">Ciudad</label>
                                    <select name="" id="">
                                        <option value="">Medellin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="text" class="form-label">Ficha</label>
                                    <input type="email" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="text" class="form-label">Cargo</label>
                                    <input type="email" name="email" id="email" />
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Información Específica</h3>
                <fieldset>
                    <h2>Información Específica</h2>
                    <p class="desc">Please enter your infomation and proceed to next step so we can build your
                        account</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">RH</label>
                                    <select name="" id="">
                                        <option value="">TI</option>
                                        <option value="">CC</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">EPS</label>
                                    <input type="text">
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Talla Camisa</label>
                                    <select name="" id="">
                                        <option value="">TI</option>
                                        <option value="">CC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="text" class="form-label">Fotografia</label>
                                    <input type="file" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="text" class="form-label">Documento de Identidad</label>
                                    <input type="file" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="text" class="form-label">Certificado Afiliación EPS</label>
                                    <input type="file" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="text" class="form-label">Constancia de Estudio</label>
                                    <input type="file" name="email" id="email" />
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Otra Información</h3>
                <fieldset>
                    <h2>Otra Información</h2>
                    <p class="desc">Set up your money limit to reach the future plan</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Tipo Alimentación</label>
                                    <select name="" id="">
                                        <option value="">Vegana</option>
                                        <option value="">Diabetico</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Enfermedades</label>
                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Alergias</label>
                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="text" class="form-label">Medicamentos</label>
                                    <input type="text" name="email" id="email" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 for="">Desea participar en el tour por Medellin</h4>
                                    <br>
                                    <label for="">
                                        SI <input type="checkbox">
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>

</section>
<!--end contact-->
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
