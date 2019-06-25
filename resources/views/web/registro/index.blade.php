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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <img src="/images/recomendaciones.png" alt="">
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
        <form method="POST" id="form" class="signup-form register" action="#">
            <div>
                <h3>Empecemos!</h3>
                <fieldset class="row">
                    <h2 class="col-md-12 text-uppercase">Bienvenido(a) instructor del <span class="color-tittle">{{session("centro")}} </span>de la Regional
                        <span class="color-tittle">{{session("regional")}}</span>
                    </h2>


                    <div class="choose-bank col-md-12 mt-4">
                        <p class="choose-bank-desc">
                            Las inscripciones este año se harán por medio de esta plataforma, sin embargo, hay que leer detenidamente cada de las instrucciones que se le presentarán a continuación.
                            Se debe tener presente los cupos para cada centro y para cada una de las categorías, los pasos que se deben seguir son los siguientes :
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Registrar los datos del instructor que están en el siguiente paso

                                </li>
                                <li class="list-group-item">

                                    Antes de realizar el registros debes contar con el certificado de estudio, eps, cedula y fotografía de cada aprendiz

                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Para la foto del aprendiz y del instructor se deben seguir las siguientes indicaciones
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="section-lyla btn btn-formato btn-lg" data-toggle="modal" data-target="#myModal">
                                                Ver
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Descargar el archivo de excel para inscripción de los aprendices
                                        </div>
                                        <div class="col-md-4">
                                        <a href="{{asset('files/Inscripciones.xlsx')}}" class="section-lyla btn btn-formato">Descargar</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            Si deseas obtener mas información te recomendamos ver el siguiente video
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="section-lyla btn btn-formato btn-lg" data-toggle="modal" data-target="#myModal">
                                                Ver
                                            </button>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </p>
                      
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
                                    <label for="">Tipo Documento <b class="text-danger">*</b></label>
                                    <select class="form-control" name="tipo_documento" id="" required>
                                        <option value="">Seleccione</option>
                                        <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                                        <option value="CÉDULA DE EXTRANJERÍA">CÉDULA DE EXTRANJERÍA</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Documento <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="number" name="documento" id="documento" required />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Nombres <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="nombre" id="nombre" required />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Apellidos <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="apellido" id="apellido" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Correo Principal <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="email" name="correo" id="correo" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Correo Alterno</label>
                                    <input onkeyup="mayus(this);" type="email" name="correo_alterno" id="correo_alterno" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Tipo de Contrato <b class="text-danger">*</b></label>
                                    <select name="tipo_contrato" id="tipo_contrato" required>
                                        <option value="">Seleccione</option>
                                        <option value="PLANTA">PLANTA</option>
                                        <option value="CONTRATISTA">CONTRATISTA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="telefono" class="form-label">Teléfono Principal <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="telefono" id="telefono" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefono" class="form-label">Teléfono Alterno</label>
                                    <input onkeyup="mayus(this);" type="text" name="telefono_alterno" id="telefono_alterno" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Fecha Nacimiento <b class="text-danger">*</b></label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Fotografia <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="file" name="fotografia" id="fotografia" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="text" class="form-label">Ciudad <b class="text-danger">*</b></label>
                                    <select name="ciudad" id="ciudad" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="text" class="form-label">Programa de Formación que imparte <b class="text-danger">*</b></label>
                                    <select name="programa_formacion" id="programa_formacion" required>
                                        <option value="">Seleccione</option>
                                        <option value="TG. EN ANÁLISIS Y DESARROLLO DE SISTEMAS DE INFORMACIÓN">TG. EN
                                            ANÁLISIS Y DESARROLLO DE SISTEMAS DE INFORMACIÓN</option>
                                        <option value="TG. EN PRODUCCIÓN DE MULTIMEDIA">TG. EN PRODUCCIÓN DE MULTIMEDIA
                                        </option>
                                        <option value="TG. EN GESTIÓN DE REDES DE DATOS">TG. EN GESTIÓN DE REDES DE
                                            DATOS</option>
                                        <option value="TG. EN MANTENIMIENTO DE EQUIPOS DE CÓMPUTO, DISEÑO E INSTALACIÓN DE CABLEADO ESTRUCTURADO">
                                            TG. EN MANTENIMIENTO DE EQUIPOS DE CÓMPUTO, DISEÑO E INSTALACIÓN DE CABLEADO
                                            ESTRUCTURADO</option>
                                        <option value="TG. EN ANIMACIÓN 3D">TG. EN ANIMACIÓN 3D</option>
                                        <option value="TG. EN DESARROLLO DE VIDEOJUEGOS">TG. EN DESARROLLO DE
                                            VIDEOJUEGOS</option>
                                        <option value="TG. EN PRODUCCIÓN DE MEDIOS AUDIOVISUALES DIGITALES">TG. EN
                                            PRODUCCIÓN DE MEDIOS AUDIOVISUALES DIGITALES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text" class="form-label">Ciudad de Desplazamiento Aereo <b class="text-danger">*</b></label>
                                    <select name="ciudad_desplazamiento" id="ciudad_desplazamiento" required>
                                        <option value="">Seleccione</option>
                                    </select>
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
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">RH <b class="text-danger">*</b></label>
                                    <select name="rh" id="rh" required>
                                        <option value="">Seleccione</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="O+">O+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>
                                        <option value="O-">O-</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">EPS <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="eps" id="eps" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">ARL <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="arl" id="arl" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">Talla Camisa <b class="text-danger">*</b></label>
                                    <select name="talla_camisa" id="talla_camisa" required>
                                        <option value="">Seleccione</option>
                                        <option value="XS">XS</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Alimentación Especial</label>
                                    <select name="tipo_alimentacion" id="tipo_alimentacion">
                                        <option value="NO APLICA">NO APLICA</option>
                                        <option value="VEGANA">VEGANA</option>
                                        <option value="DIABÉTICO">DIABÉTICO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Enfermedades</label>
                                    <textarea name="enfermedades" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="">Alergias</label>
                                    <textarea name="alergias" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="text" class="form-label">Medicamentos que debe tomar</label>
                                    <input onkeyup="mayus(this);" type="text" name="medicamentos" id="medicamentos" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 for="">Desea participar en el tour por Medellin
                                        <br>
                                        <label for="">
                                            SI <input onkeyup="mayus(this);" type="checkbox" name="tour" value="si">
                                        </label>
                                    </h4>
                                    <br>


                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Aprendices y Documentación</h3>
                <fieldset>
                    <h2>Aprendices y Documentación</h2>
                    <p class="desc">Set up your money limit to reach the future plan</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <label for="email" class="form-label">Archivo de Excel con los aprendices</label>
                                <input onkeyup="mayus(this);" class="col-md-offset-4 col-md-4" type="file" name="aprendices" id="aprendices" required />
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="form-row" id="" style="margin-top: 10%">
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5>Documento de Identidad</h5>
                                        <p>Adjuntar los documentos de identidad de cada aprendiz de la siguiente forma :
                                        </p>
                                        <p><b>Nombre del archivo:</b> numerodocumento_doc.pdf</p>
                                        <p><b>Ejemplo:</b> 1152694464_doc.pdf</p>
                                    </div>
                                    <div class="panel-body dropzone" id="cedulas">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5>Certificados de Afiliación a EPS</h5>
                                        <p>Adjuntar los certificados de afiliación a EPs de cada aprendiz de la
                                            siguiente forma :
                                        </p>
                                        <p><b>Nombre del archivo:</b> numerodocumento_eps.pdf</p>
                                        <p><b>Ejemplo:</b> 1152694464_eps.pdf</p>
                                    </div>
                                    <div class="panel-body dropzone" id="eps">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-row" id="">
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5>Certificado de Estudio (SOFIAPLUS)</h5>
                                        <p>Adjuntar los certificados de estudio de cada aprendiz de la siguiente forma :
                                        </p>
                                        <p><b>Nombre del archivo:</b> numerodocumento_cert.pdf</p>
                                        <p><b>Ejemplo:</b> 1152694464_cert.pdf</p>
                                    </div>
                                    <div class="panel-body dropzone" id="certificado">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5>Fotografias</h5>
                                        <p>Adjuntar las fotografias de cada aprendiz de la siguiente forma :
                                        </p>
                                        <p><b>Nombre del archivo:</b> numerodocumento_foto.png</p>
                                        <p><b>Ejemplo:</b> 1152694464_foto.jpg</p>
                                    </div>
                                    <div class="panel-body dropzone" id="foto">

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


<!--end contact-->
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
<script src="/js/registro_usuarios.js"></script>
@endsection