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
                <h4>Registro al evento</h4>
                <!--begin success message -->
                <p class="contact_success_box" style="display:none;">Gracias, hemos recibido el registro exitosamente</p>
                <!--end success message -->
                <!--Slider Form-->
                <div class="container">
                    <div class="stepwizard col-md-offset-1">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>1: Código </p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>2: Datos Categoría</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>3: Datos Personales</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                <p>4: Datos específos</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                <p>5: Último paso</p>
                            </div>
                        </div>
                    </div>

                    <form id="contact-form" class="contact" action="" method="post">
                        <div class="row setup-content" id="step-1">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <input class="contact-input white-input" required="" name="codigo" placeholder="Ingresar Código*" type="text">
                                    <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-6 col-md-offset-3">

                                <input class="contact-input white-input" disabled required="" name="regional" placeholder="Regional" type="text">

                                <input class="contact-input white-input" disabled required="" name="centro" placeholder="Centro" type="text">

                                <select class="contact-input white-input" required="" name="categoria">
                                    <option value="" disabled selected>----Seleccionar Categoría----</option>
                                </select>

                                <select class="contact-input white-input" required="" name="tipo">
                                    <option value="" disabled selected>----Seleccionar Rol----</option>
                                </select>
                                <button class="btn btn-primary prevBtn btn-sm pull-left" type="button">Anterior</button>
                                <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <select class="contact-input white-input" required="" name="categoria">
                                                <option value="" disabled selected>---- Tipo de documento ----</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="documento" placeholder="Documento*" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="nombres" placeholder="Nombres*" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="apellidos" placeholder="Apellidos*" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="foto" placeholder="Foto*" type="file">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="ficha" placeholder="Ficha*" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="correo_principal" placeholder="Correo Principal*" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" name="correo_alterno" placeholder="Correo Alterno" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="telefono" placeholder="Teléfono*" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="otro_telefono" placeholder="Teléfono Alterno" type="text">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary prevBtn btn-sm pull-left" type="button">Anterior</button>
                                    <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-4">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Cargo" placeholder="Cargo" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Rh" placeholder="Rh*" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Talla_camisa" placeholder="Talla Camisa*" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Eps" placeholder="Eps*" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Ciudad" placeholder="Ciudad*" type="text">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="contact-input white-input" required="" name="Empresa" placeholder="Empresa" type="text">
                                        </div>
                                    </div>

                                    <button class="btn btn-primary prevBtn btn-sm pull-left" type="button">Anterior</button>
                                    <button class="btn btn-primary nextBtn btn-sm pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row setup-content" id="step-5">
                    <div class="col-xs-6 col-md-offset-3">
                        <div class="col-md-12">
                            <textarea class="contact-commnent white-input" rows="2" cols="5" name="contact_message" placeholder="Alergias"></textarea>
                            <textarea class="contact-commnent white-input" rows="2" cols="5" name="contact_message" placeholder="Enfermedades"></textarea>
                            <textarea class="contact-commnent white-input" rows="2" cols="5" name="contact_message" placeholder="Medicamentos"></textarea>
                            <button class="btn btn-primary prevBtn btn-sm pull-left" type="button">Anterior</button>
                            <input value="Registrarse" class="btn btn-primary nextBtn btn-sm pull-right" type="submit" id="submit-button">
                        </div>
                    </div>
                </div>
                </form>

            </div>

            <!--end Slider Form-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</section>
<!--end contact-->


@endsection